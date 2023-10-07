<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bodega;
use App\Models\Dispositivo;
use App\Models\Modelo;


class DispositivoController extends Controller
{   
    //Lista de todo los dispositivos
    public function get(){
        try{
            $dispositivos = Dispositivo::with(['bodega','modelo.marca'])->get();

            if($dispositivos->isEmpty()){
                $data = [
                    'code' => 404,
                    'status' => 'error',
                    'message' => 'Sin dispositivos'
                ];
            } else {
                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'Dispositivos' => $dispositivos
                    
                ];
            }

            return response()->json($data, $data['code']);

        }catch(\Throwable $th){
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    //Lista dispositivos x id bodega
    public function getByBod($id){
        try{
            $dispositivo = Dispositivo::where('id_bodega', $id)
            ->with(['bodega','modelo.marca'])
            ->get();

            if ($dispositivo->isEmpty()) {
                $data = [
                    'code' => 404,
                    'status' => 'error',
                    'message' => 'Sin dispositivos en bodega'
                ];
            } else {
                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'Dispositivos' => $dispositivo->all(),
                ];
            }

            return response()-> json($data, $data['code']);

        }catch(\Throwable $th){
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
    
    //Lista dispositivos x modelo
    public function getByMod($id){
        try{
            $dispositivo = Dispositivo::where('id_modelo', $id)
            ->with(['bodega','modelo.marca'])
            ->get();

            if ($dispositivo->isEmpty()) {
                $data = [
                    'code' => 404,
                    'status' => 'error',
                    'message' => 'Sin dispositivos'
                ];
            } else {
                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'Dispositivos' => $dispositivo
                ];
            }

            return response()-> json($data, $data['code']);

        }catch(\Throwable $th){
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    //Lista dispositivos x marca
    public function getByMar($id){
        try {
            $dispositivos = Dispositivo::whereHas('modelo', function ($query) use ($id) {
                $query->where('id_marca', $id);
            })
            ->with(['bodega', 'modelo.marca'])
            ->get();

            if ($dispositivos->isEmpty()) {
                $data = [
                    'code' => 404,
                    'status' => 'error',
                    'message' => 'Sin dispositivos'
                ];
            } else {
                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'Dispositivos' => $dispositivos
                ];
            }

            return response()->json($data, $data['code']);

        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
}

