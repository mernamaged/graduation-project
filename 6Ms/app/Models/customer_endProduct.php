<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer_endProduct extends Model
{
    use HasFactory;
    protected $table='customer_endproduct';
    protected $primaryKey = 'customer_endProduct_id';
    public $timestamps = false;
}
