@extends('console.main')

@section('breadcrumb')
    @include('console.content.shared.breadcrumb')
@endsection

@section('content')

    <div class="row">
        <div class="col-md-2">
            @include('console.content.shared.menu')
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <x-response-form />
                    <form action="{{ is_null($id) ? route('content.store') : route('content.update', ['id' => $id]) }}" method="post" autocomplete="off">
                        @csrf
                        @if (is_null($id) === false)
                            @method("put")
                        @endif

                        <input type="hidden" name="id" value="{{ $id }}">
                        <input type="hidden" name="category_id" value="{{ $category_id }}">

                        <div class="mb-3">
                            <label for="title" class="form-label">Título</label>
                            <input type="text" name="title" class="form-control" value="{{ isset($Model) ? $Model->title : old('title') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Conteúdo</label>
                            <textarea name="content" class="form-control">{{ isset($Model) ? $Model->content : old('content') }}</textarea>
                        </div>              
                        
                        <div class="text-right">
                            <a href="{{ route('content.index', ['category_id' => $category_id]) }}" class="btn btn-light">Voltar</a>
                            <button type="submit" class="btn btn-dark">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection