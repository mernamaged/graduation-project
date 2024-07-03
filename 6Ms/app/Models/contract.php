<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contract extends Model
{
    use HasFactory;
    protected $table='contract';
    protected $primaryKey = 'contract_id';
    public $timestamps = false;
}
