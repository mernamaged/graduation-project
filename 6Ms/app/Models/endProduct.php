<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class endProduct extends Model
{
    use HasFactory;
    protected $table ="end_products";
    protected $primaryKey = "endPro_id";
    protected $fillable=['image','stock'];
    public $timestamps = false;

    public function superEntity()
    {
        return $this->belongsTo(Product::class, 'endPro_id', 'prod_id');
    }
      // Relationship with orders (if needed)
      public function orders()
      {
          return $this->hasMany(order::class);
      }
      public function reduceStock($quantity)
      {
          if ($this->stock >= $quantity) {
              $this->stock -= $quantity;
              $this->save();
          } else {
              throw new \Exception('Insufficient stock.');
          }
      }
}
