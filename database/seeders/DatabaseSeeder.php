<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Models;
use App\Models\Brands;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //$this->call(ModelsSeeder::class);

        $jsonFile = database_path('json/models.json');

        if (File::exists($jsonFile)) {
            $json = File::get($jsonFile);
            $models = json_decode($json, true);

            foreach ($models as $model) {

                $brand = Brands::where('name', $model['brand_name'])->first();

                if(!$brand)   
                    $brand_id = Brands::insertGetId([
                        'name' => $model['brand_name'],
                    ]);
                else  $brand_id = $brand->brand_id;

                Models::updateOrInsert(
                    ['name' => $model['name']],
                    [
                        'sku' =>  $model['id'],
                        'average_price' => $model['average_price'],
                        'brand_id' => $brand_id,
                    ]
                );
            
        }}
    }
}
