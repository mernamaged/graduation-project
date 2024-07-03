<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class endProduct extends Model
{
    use HasFactory;
    protected $table ="end_products";
    protected $primaryKey = "endPro_id";
    protected $fillable=['endPro_image'];
    public $timestamps = false;

    public function superEntity()
    {
        return $this->belongsTo(Product::class, 'prod_id', 'prod_id');
    }
}
