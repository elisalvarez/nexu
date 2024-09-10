<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

use App\Http\Requests\GetMoodelsFilterRequest;
use App\Http\Requests\PutModelsRequest;
use App\Models\Brands;
use App\Models\Models;

class ModelsController extends Controller
{
    public function index (GetMoodelsFilterRequest $request) {
        try {
            $greater = $request->greater;
            $lower = $request->lower;

            if($greater || $lower){
                $validated = $request->validated();
            } 

            $models = Models::select('models.sku as id', 'models.name', 'models.average_price')
                            ->when($request->has('lower'), function ($query) use ($lower) {
                                $query->where('models.average_price', '<', $lower);
                            })
                            ->when($request->has('greater'), function ($query) use ($greater) {
                                $query->where('models.average_price', '>', $greater);
                            })
                            ->orderBy('models.average_price', 'ASC')
                            ->get();
    
          return response()->json($models, 200);
  
        } catch (\Exception $th) {
          return response()->json([
            'status' => false,
            'message' => 'Hubo un problema al procesar la solicitud.',
            'error' => $th->getMessage()
          ], 500);
        }
    }

    public function update ($id, PutModelsRequest $request) {
        try {

            $validated = $request->validated();
            $validated = $request->safe()->only(['average_price']);

            $model = Models::where('sku',$id)->first();

            $model->average_price = $validated['average_price'];
            $model->save();
            
            return response()->json([
                'status' => true,
                'message' => 'Modelo actualizado exitosamente.',
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
}
