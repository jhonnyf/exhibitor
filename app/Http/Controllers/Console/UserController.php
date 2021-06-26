<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User as Model;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'list' => Model::where('active', '<>', 2)->orderBy('id', 'desc'),
        ];

        return view('console.user.index', $data);
    }

    public function form(int $id = null)
    {
        $data = ['id' => $id];

        if (is_null($id) === false) {
            $data['Model'] = Model::find($id);
        }

        return view('console.user.form', $data);
    }

    public function store(UserStoreRequest $request)
    {
        $data = $request->all();

        if (isset($request->password)) {
            $data['password'] = Hash::make($request->password);
        }

        $response = Model::create($data);

        $request->session()->flash('success', 'Ação realizada com sucesso!');

        return redirect()->route('user.form', ['id' => $response['id']]);
    }

    public function update(int $id, UserUpdateRequest $request)
    {
        $Model = Model::find($id);

        $data = $request->all();
        if (key_exists('password', $data)) {
            unset($data['password']);
        }

        $Model->fill($data)->save();

        $request->session()->flash('success', 'Ação realizada com sucesso!');

        return redirect()->route('user.form', ['id' => $id]);
    }

    public function status(int $id)
    {
        $Model = Model::find($id);

        $Model->active = $Model->active == 1 ? 0 : 1;
        $Model->save();

        return redirect()->route('user.index');
    }

    public function destroy(int $id)
    {
        $Model = Model::find($id);

        $Model->active = 2;
        $Model->save();

        return redirect()->route('user.index');
    }
}
