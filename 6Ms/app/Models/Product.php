<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $table ="product";
    protected $primaryKey = "prod_id";
    protected $fillable = ['p_name'];

    // Define a relationship for packages
    public function packages()
    {
        return $this->hasMany(package::class,'package_id','prod_id');
    }
    // Define the relationship with Order
    public function orders()
    {
        return $this->belongsToMany(order::class);
    }
    public function rawMaterials()
    {
        return $this->hasMany(raw::class,'raw_id','prod_id');
    }
}
