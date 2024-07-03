<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table='users';
    protected $primaryKey = 'UserID';
    protected $hidden = ['Password'];
    protected $fillable=['image'];

    public function contact() {
        // Define the relationship with the 'contact' table, using 'contact_name' as the foreign key
        return $this->hasMany('App\Contact', 'contact_id', 'UserID');
    }
    public function order() {
        // Define the relationship with the 'contact' table, using 'contact_name' as the foreign key
        return $this->hasMany('App\Contact', 'order_id', 'UserID');
    }
    public function subclassable()
    {
        return $this->morphTo();
    }
}
