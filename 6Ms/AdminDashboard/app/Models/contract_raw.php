<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contract_raw extends Model
{
    use HasFactory;
    protected $table='contract_raw';
    protected $primaryKey = 'contract_raw_id';
    public $timestamps = false;
}
