<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class admin extends User
{

    use HasFactory,Notifiable;
    protected $table='admins';
    protected $primaryKey = 'admin_id';
    public $timestamps = false;
    protected $fillable=['admin_img','admin_id'];
    public function superclass()
    {
        return $this->morphOne(User::class, 'subclassable');
    }
}
