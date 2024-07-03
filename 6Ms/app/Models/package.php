<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class package extends Product
{
    use HasFactory;
    protected $table ="packages";
    protected $primaryKey = "package_id";
    protected $fillable = ['product_id'];

    // Define a relationship to retrieve the product name from Product model
    public function product()
    {
        return $this->belongsTo(product::class);
    }
    public function rawMaterials()
    {
        return $this->hasMany(raw::class, 'package_id');
    }
    public function superEntity()
    {
        return $this->belongsTo(Product::class, 'package_id', 'prod_id');
    }
}
