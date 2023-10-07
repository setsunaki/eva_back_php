<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    use HasFactory;
    
    protected $table ='bodega';

    public function Dispositivo(){
        return $this->belongsTo(Dispositivo::class, 'id_bodega');
    }
}
