<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table='order';
    protected $primaryKey = 'order_id';
    protected $fillable = ['UserID'];
    public function user()
    {
        return $this->belongsTo(User::class,'order_id','UserID');
    }
}
