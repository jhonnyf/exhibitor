<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function user_type()
    {
        return $this->belongsTo(UserType::class);
    }

    public function files()
    {
        return $this->belongsToMany(File::class, 'user_file');
    }

    public function other()
    {
        return $this->hasOne(UserOther::class);
    }
}
