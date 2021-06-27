<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Content as Model;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'list' => Model::where('active', '<>', 2)->orderBy('id', 'desc'),
        ];

        if (isset($request->category_id)) {
            $Category = Category::find($request->category_id);

            $data['category_id'] = $Category->id;


            // echo '<pre>';
            // print_r($Category->contents()->get());
            // exit();
        }
        

        return view('console.content.index', $data);
    }
}
