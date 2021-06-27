<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['default'];

    public function contents()
    {
        return $this->belongsToMany(Content::class)->withTimestamps();
    }

    public function categoryPrimary()
    {
        return $this->belongsToMany(Category::class, 'category_category', 'secondary_id', 'primary_id')->withTimestamps();
    }

    public function categorySecondary()
    {
        return $this->belongsToMany(Category::class, 'category_category', 'primary_id', 'secondary_id')->withTimestamps();
    }
}
