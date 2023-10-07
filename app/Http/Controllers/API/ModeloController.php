<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modelo;
use App\Models\Marca;



class ModeloController extends Controller
{   
    
    //Modelos segun id_marca
    public function getByMarca($id){
        try{
            $marca = Modelo::where('id_marca', $id)->get();
            $modifiedData = $marca->map(function ($modelo) {
                return [
                    'id' => $modelo->id,
                    'nombre' => $modelo->nombre,
                    'id_marca' =>$modelo->id_marca,
                    'marca' => $modelo->marca->nombre 
                ];
            });

            if($modifiedData->isEmpty()){
                
                $data = [
                    'code' => 404,
                    'status' => 'error',
                    'message' => 'Sin marcas'
                ];
            }else{
                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'Modelo' => $modifiedData
                ];
            }
            
            return response()->json($data, $data['code']);

        }catch(\Throwable $th){
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

}
