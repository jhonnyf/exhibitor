<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserOtherUpdateRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\FileGallery;
use App\Models\User as Model;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'list' => Model::where('active', '<>', 2)
                ->where('user_type_id', $request->user_type_id)
                ->orderBy('id', 'desc'),
        ];

        return view('console.user.index', $data);
    }

    public function form(int $id = null, Request $request)
    {
        $data = [
            'id'           => $id,
            'user_type_id' => isset($request->user_type_id) ? $request->user_type_id : null,
        ];

        if (is_null($id) === false) {
            $data['Model']        = Model::find($id);
            $data['user_type_id'] = $data['Model']->user_type_id;
        }

        return view('console.user.form', $data);
    }

    public function store(UserStoreRequest $request)
    {
        $data = $request->all();

        if (isset($request->password)) {
            $data['password'] = Hash::make($request->password);
        }

        $UserType = UserType::find($request->user_type_id);
        $response = $UserType->users()->create($data);

        $User = Model::find($response['id']);
        $User->other()->create(['bio' => '']);

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

    public function other(int $id)
    {
        $data = [
            'id'    => $id,
            'Model' => Model::find($id),
        ];

        $data['user_type_id'] = $data['Model']->user_type_id;

        return view('console.user.others', $data);
    }

    public function otherUpdate(int $id, UserOtherUpdateRequest $request)
    {
        $Model = Model::find($id);

        $Model->other->fill($request->all())->save();

        $request->session()->flash('success', 'Ação realizada com sucesso!');

        return redirect()->route('user.other', ['id' => $id]);
    }

    public function files(int $id)
    {
        $data = [
            'id'             => $id,
            'Model'          => Model::find($id),
            'FilesGalleries' => FileGallery::where('active', '<>', 2)->get(),
        ];

        $data['user_type_id'] = $data['Model']->user_type_id;

        return view('console.user.files', $data);
    }
}
