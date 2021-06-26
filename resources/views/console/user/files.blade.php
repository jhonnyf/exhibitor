@extends('console.main')

@section('breadcrumbs')
    <x-breadcrumbs />
@endsection

@section('content')
    <h2 class="title-form mb-4">{{ is_null($id) ? 'Criação' : 'Edição' }}</h2>

    <div class="row">
        <div class="col-md-2">
            @include('console.user.shared.menu')
        </div>
        <div class="col-md-10">
            <x-response-form />
            
                <p>Arquivos</p>

                <div class="text-end">
                    <a href="{{ route('user.index', ['user_type_id' => $user_type_id]) }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
                    
                </div>
            
        </div>
    </div>
@endsection