<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class package extends Product
{
    use HasFactory;
    protected $table ="packages";
    protected $primaryKey = "package_id";
    public $timestamps = false;

}
