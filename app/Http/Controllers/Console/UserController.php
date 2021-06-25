<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return view('console.user.index');
    }

    public function form(int $id = null)
    {
        $data = ['id' => $id];

        return view('console.user.form', $data);
    }
}
