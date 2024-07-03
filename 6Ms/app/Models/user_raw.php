<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_raw extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "user_raw";
    protected $primaryKey = 'user_raw_id';
}
