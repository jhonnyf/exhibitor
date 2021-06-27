<?php

namespace App\View\Components;

use App\Models\File;
use Illuminate\View\Component;

class FilesList extends Component
{
    public $files;
    public $file_gallery_id;
    public $user_id;

    public function __construct(File $files, int $fileGalleryId, int $userId = null)
    {

        $this->files           = $files;
        $this->file_gallery_id = $fileGalleryId;
        $this->user_id         = $userId;
    }

    public function render()
    {
        return view('components.files-list');
    }
}
