<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Http\Requests\FileUpdateRequest;
use App\Http\Requests\FileUpload;
use App\Models\Content;
use App\Models\File as Model;
use App\Models\FileGallery;
use App\Models\User;
use Illuminate\Http\Request;

class FileController extends Controller
{

    public function gallery(string $module, int $id, Request $request)
    {
        $data = [
            'id'              => $id,
            'module'          => $module,
            'FilesGalleries'  => FileGallery::where('active', '<>', 2)->get(),
            'file_gallery_id' => $request->file_gallery_id,
            'url_back'        => '',
            'request_params'  => $request->all(),
        ];

        if ($module == 'user') {
            $data['Model']        = User::find($id);
            $data['user_type_id'] = $data['Model']->user_type_id;
            $data['url_back']     = route('user.index', ['user_type_id' => $data['Model']->user_type_id]);
        }

        if ($module == 'content') {
            $data['Model']    = Content::find($id);
            $data['url_back'] = route('content.index', ['category_id' => $request->category_id]);
        }

        if ($data['file_gallery_id'] > 0) {
            $data['files'] = $data['Model']->files()->where(['file_gallery_id' => $data['file_gallery_id']])->where('active', '<>', 2)->get();
        }

        return view('console.file.files', $data);
    }

    public function index(int $id)
    {
        $data = [
            'id'    => $id,
            'Model' => Model::find($id)->contents->first(),
        ];

        return view('console.file.form', $data);
    }

    public function update(int $id, FileUpdateRequest $request)
    {
        $File = Model::find($id);

        $File->contents->first()->fill($request->all())->save();

        return response()->json([
            'error'   => false,
            'message' => 'Ação realizada com sucesso!',
            'return'  => [],
        ]);
    }

    public function status(int $id)
    {
        $Model = Model::find($id);

        $Model->active = $Model->active == 1 ? 0 : 1;
        $Model->save();

        return response()->json([
            'error'   => false,
            'message' => 'Ação realizada com sucesso!',
            'return'  => $Model,
        ]);
    }

    public function destroy(int $id)
    {
        $Model = Model::find($id);

        $Model->active = 2;
        $Model->save();

        return response()->json([
            'error'   => false,
            'message' => 'Ação realizada com sucesso!',
            'return'  => [],
        ]);
    }

    public function upload(string $module, int $id, int $file_gallery_id, FileUpload $request)
    {
        if ($request->hasFile('file') === false) {
            return response()->isInvalid();
        }

        $file = $request->file('file');

        $data = [
            'file_gallery_id' => $file_gallery_id,
            'original_name'   => $file->getClientOriginalName(),
            'extension'       => $file->getClientOriginalExtension(),
            'size'            => round($file->getSize() / 1024 / 1024, 4),
            'mime_type'       => $file->getMimeType(),
        ];

        $data['file_path'] = $request->file->store("public/{$module}");
        $data['file_path'] = str_replace("public/", "", $data['file_path']);

        $response = Model::create($data);

        $File = Model::find($response->id);
        $File->contents()->create();

        if ($module == 'user') {
            $File->filesUsers()->attach($id);
        }

        if ($module == 'content') {
            $File->filesContents()->attach($id);
        }

        return response()->json($response);
    }
}
