<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marca;

class MarcaController extends Controller
{   
    //Lista de marcas
    public function get(){
        try{
            $marca = Marca::get();

            if(is_object($marca)){
                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'Marcas' => $marca
                ];
            }else{
                $data = [
                    'code' => 404,
                    'status' => 'error',
                    'message' => 'Sin marcas'
                ];
            }
            return response()-> json($data, $data['code']);

        } catch(\Trowable $th)
        {
            return response()->json(['error' => $th->getMessage()], 500);
        }
        
    }
}
