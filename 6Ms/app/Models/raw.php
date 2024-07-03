<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class raw extends Model
{
    use HasFactory;
    protected $table='raw_materials';
    protected $primaryKey = 'raw_id';
    public $timestamps = false;
    public function product()
    {
        return $this->belongsTo(product::class);
    }
    public function package()
    {
        return $this->belongsTo(package::class, 'package_id');
    }
}
