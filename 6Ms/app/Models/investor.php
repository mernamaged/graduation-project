<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class investor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "investors";
    protected $primaryKey = 'investor_id';
    protected $fillable = [
        'investor_id'];
}
