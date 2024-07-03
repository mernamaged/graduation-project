<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class package_investor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "package_investor";
    protected $primaryKey = 'package_investor_id';
}
