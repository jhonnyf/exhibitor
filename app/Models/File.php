<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_gallery_id',
        'file_path',
        'original_name',
        'extension',
        'size',
        'mime_type',
    ];

    public function filesUsers()
    {
        return $this->belongsToMany(User::class, 'user_file')->withTimestamps();
    }

    public function filesContents()
    {
        return $this->belongsToMany(Content::class)->withTimestamps();
    }

    public function contents()
    {
        return $this->belongsToMany(Content::class, 'file_content')->withTimestamps();
    }
}
