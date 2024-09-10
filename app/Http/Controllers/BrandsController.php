<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\StoreBrandModelsRequest;
use App\Models\Brands;
use App\Models\Models;

class BrandsController extends Controller
{
    
    public function index () {
      try {

        DB::statement('SET @id = 0');
        $brands = Brands::leftjoin('models', 'models.brand_id', '=', 'brands.brand_id')
        ->selectRaw('(@id:=@id+1) as id')
        ->addSelect('brands.name as nombre')
        ->selectRaw('FLOOR(AVG(models.average_price)) as average_price')
        ->where('average_price', '>', 0)
        ->groupBy('brands.name')
        ->orderBy('brands.brand_id', 'ASC')
        ->get();

        return response()->json($brands, 200);

      } catch (\Exception $th) {
        return response()->json([
          'status' => false,
          'message' => 'Hubo un problema al procesar la solicitud.',
          'error' => $th->getMessage()
        ], 500);
      }
    }


    public function store(StoreBrandRequest $request) {
        try {
  
            $validated = $request->validated();
            $validated = $request->safe()->only(['name']);

            $brand = new Brands;
            $brand->name = $validated['name'];
            $brand->save();

            return response()->json([
                'status' => true,
                'message' => 'Marca registrada exitosamente.',
                'brand' => $brand->name
            ], 201);
  
        } catch (\Exception $th) {
          return response()->json([
            'status' => false,
            'message' => 'Hubo un problema al procesar la solicitud.',
            'error' => $th->getMessage()
          ], 500);
        }
    }

    public function indexModels($id) {
        try {
  

            $brands = Models::select('sku as id', 'name', 'average_price')->where('brand_id', $id)
                            ->orderBy('name', 'ASC')
                            ->get();
    
            return response()->json($brands, 200);
  
        } catch (\Exception $th) {
          return response()->json([
            'status' => false,
            'message' => 'Hubo un problema al procesar la solicitud.',
            'error' => $th->getMessage()
          ], 500);
        }
    }

    public function storeModels($id, StoreBrandModelsRequest $request) {
        try {
  
            $validated = $request->validated();
            $validated = $request->safe()->only(['name', 'average_price']);

            $model = new Models;
            $model->name = $validated['name'];
            $model->average_price = $validated['average_price'];
            $model->brand_id = $id;

            $model->sku = $this->generateUniqueSku();
        
            $model->save();
            
            return response()->json([
                'status' => true,
                'message' => 'Modelo registrada exitosamente.',
                'model_name' => $model->name,
                'model_id' => $model->sku
            ], 201);
  
        } catch (\Exception $th) {
          return response()->json([
            'status' => false,
            'message' => 'Hubo un problema al procesar la solicitud.',
            'error' => $th->getMessage()
          ], 500);
        }
    }

    private function generateUniqueSku()
    {
        $maxSku = Models::max('sku');

        if ($maxSku === null) {
            return 1;
        }
        
        return $maxSku + 1;
    }

}
