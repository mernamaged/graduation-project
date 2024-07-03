<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "order_product";
    protected $primaryKey = 'order_product_id';
}
