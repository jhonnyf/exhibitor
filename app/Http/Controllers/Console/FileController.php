<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Models\File as Model;
use Illuminate\Http\Request;

class FileController extends Controller
{

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
