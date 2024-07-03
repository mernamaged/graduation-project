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
    public function subEntities()
    {
        return $this->hasMany(endProduct::class, 'prod_id', 'prod_id');
    }
}
