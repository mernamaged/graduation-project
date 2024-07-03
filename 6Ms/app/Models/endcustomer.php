<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class endcustomer extends Model
{
    use HasFactory;
    protected $table='endcustomers';
    protected $primaryKey = 'customer_id';
    protected $fillable = [
        'customer_id'];
    public $timestamps = false;
}
