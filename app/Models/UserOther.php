<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOther extends Model
{
    use HasFactory;

    protected $table    = 'users_others';
    protected $fillable = ['bio'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
