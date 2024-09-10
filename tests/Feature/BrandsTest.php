<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Brands;
use App\Models\Models;

class BrandsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_get_all_brands_list()
    {

        Brands::factory()->count(3)->create();
        
        $response = $this->get('/brands');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            '*' => [
                'id',
                'nombre',
                'average_price'
            ]
        ]);
    }

    public function test_post_store_brand()
    {
        $data = ['name' => 'Toyota'];

        $response = $this->post('/brands', $data);

        $response->assertStatus(201);

        $response->assertJsonStructure(['status', 'message', 'brand']);
    }

    public function test_get_index_model_brand()
    {
        Brands::factory()->count(3)->create();
        Models::factory()->count(10)->create();

        $response = $this->get('/brands/{id}/models');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            '*' => [
                'id',
                'name',
                'average_price'
            ]
        ]);
    }

    public function test_it_validates_if_brand_exists()
    {
        $data = ['name' => 'Toyota U15', 'average_price' => 150000];
        $response = $this->post('/brands/9999/models', $data);

        $response->assertStatus(422);
        $response->assertJsonStructure(['error']);
    }
 
    public function test_it_validates_if_model_name_exists_for_brand()
    {
        
        $brand = Brands::factory()->create([
            'name' => 'Toyota'
        ]);

        Models::factory()->create([
            'name' => 'MX',
            'brand_id' => $brand->brand_id
        ]);

        $data = ['name' => 'MX', 'average_price' => 150000];
 
        $response = $this->post('/brands/'.$brand->brand_id.'/models', $data);
 
        $response->assertStatus(422);
        $response->assertJsonStructure(['error']);
    }

    
    public function test_post_store_brand_model()
    {
           
        $brand = Brands::factory()->create([
            'name' => 'Toyota'
        ]);

        $data = ['name' => 'MX', 'average_price' => 150000];

        $response = $this->post('/brands/'.$brand->brand_id.'/models', $data);

        $response->assertStatus(201);

        $response->assertJsonStructure(['status', 'message', 'model_name', 'model_id']);
    }

    public function test_get_all_models_list()
    {

        Models::factory()->count(3)->create();
        
        $response = $this->get('/models');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            '*' => [
                'id',
                'name',
                'average_price'
            ]
        ]);
    }
}
