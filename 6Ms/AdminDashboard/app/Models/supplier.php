<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends User
{
    use HasFactory;
    protected $table='suppliers';
    protected $primaryKey = 'supplier_id';
    public $timestamps = false;
}
