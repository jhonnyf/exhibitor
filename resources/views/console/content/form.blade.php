@extends('console.main')

@section('breadcrumbs')
    <x-breadcrumbs />
@endsection

@section('content')
    <h2 class="title-form mb-4">{{ is_null($id) ? 'Criação' : 'Edição' }}</h2>

    <div class="row">
        <div class="col-md-2">
            @include('console.content.shared.menu')
        </div>
        <div class="col-md-10">
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
                
                <div class="text-end">
                    <a href="{{ route('content.index', ['category_id' => $category_id]) }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
                    <button type="submit" class="btn btn-dark"><i class="fas fa-save me-2"></i> Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection