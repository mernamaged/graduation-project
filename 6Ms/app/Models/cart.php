<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $table='carts';
    public $timestamps = false;
    protected $primaryKey = 'cart_id';
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($cart) {
            $cart->total_price = $cart->p_price * $cart->order_quanitity;
        });
    }
    public function user()
    {
        return $this->belongsTo(user::class,'cart_id','UserID');
    }
}
