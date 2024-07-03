<?php

namespace App\Models;

use App\Models\order as ModelsOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $primaryKey = 'order_id';
    public $timestamps = false;
    protected $fillable = ['ord_price', 'order_quanitity', 'total_price'];
    public function feedback()
    {
        // Define the relationship with the 'contact' table, using 'contact_name' as the foreign key
        return $this->belongsTo(Order::class, 'order_id', 'feed_id');
    }
   // Define the relationship with Product
   public function products()
   {
       return $this->belongsToMany(Product::class);
   }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($order) {
            $order->total_price = $order->ord_price * $order->order_quanitity + $order->space_price;
        });
    }
}
