<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'content_category')->withTimestamps();
    }

    public function files()
    {
        return $this->belongsToMany(File::class, 'content_file');
    }
}
