<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EndCustomer extends User
{
    use HasFactory;
    protected $table='endcustomers';
    protected $primaryKey = 'customer_id';
    public $timestamps = false;
}
