<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rawMaterial extends Model
{
    use HasFactory;
    protected $table='raw_materials';
    protected $primaryKey = 'raw_id';
    public $timestamps = false;
}
