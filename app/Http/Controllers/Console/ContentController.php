<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContentStoreRequest;
use App\Http\Requests\ContentUpdateRequest;
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
            $data['list']        = $Category->categoriesContents()->orderBy('id', 'desc');
        }

        return view('console.content.index', $data);
    }

    public function form(int $id = null, Request $request)
    {
        $data = [
            'id'          => $id,
            'Model'       => Model::find($id),
            'category_id' => $request->category_id,
        ];

        if (is_null($id) === false) {
            $data['category_id'] = $data['Model']->categories->first()->id;
        }

        return view('console.content.form', $data);
    }

    public function store(ContentStoreRequest $request)
    {
        $response = Model::create($request->all());

        if ($request->category_id) {
            Model::find($response->id)->categories()->attach($request->category_id);
        }

        

        $request->session()->flash('success', 'Ação realizada com sucesso!');

        return redirect()->route('content.form', ['id' => $response['id']]);
    }

    public function update(int $id, ContentUpdateRequest $request)
    {
        $Model = Model::find($id);
        $Model->fill($request->all())->save();

        $request->session()->flash('success', 'Ação realizada com sucesso!');

        return redirect()->route('content.form', ['id' => $Model->id]);
    }
}
