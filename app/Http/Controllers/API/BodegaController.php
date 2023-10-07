<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bodega;

class BodegaController extends Controller
{
    //Todas la bodegas
    public function get(){
        try{
            $bodega = Bodega::get();

            if(is_object($bodega)){
                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'Bodegas' => $bodega
                ];
            }else{
                $data = [
                    'code' => 404,
                    'status' => 'error',
                    'message' => 'Sin bodegas'
                ];
            }
            
            return response()->json($data, $data['code']);

        } catch(\Trowable $th)
        {
            return response()->json(['error' => $th->getMessage()], 500);
        }
        
    }
}
 