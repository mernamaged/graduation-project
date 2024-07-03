<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_raw extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "order_raw";
    protected $primaryKey = 'order_raw_id';
}
