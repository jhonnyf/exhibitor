<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileGallery extends Model
{
    use HasFactory;

    protected $fillable = ['file_gallery', 'module'];
    protected $table    = 'files_galleries';
}
