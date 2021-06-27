<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Http\Requests\FileUpdateRequest;
use App\Models\File as Model;

class FileController extends Controller
{

    public function index(int $id)
    {
        $data = [
            'id'    => $id,
            'Model' => Model::find($id)->content,
        ];

        return view('console.file.form', $data);
    }

    public function update(int $id, FileUpdateRequest $request)
    {
        $File = Model::find($id);

        $File->content->fill($request->all())->save();

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
}
