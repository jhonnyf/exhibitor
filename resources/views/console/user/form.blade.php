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
            <form action="{{ is_null($id) ? route('user.store') : route('user.update', ['id' => $id]) }}" method="post" autocomplete="off">
                @csrf
                @if (is_null($id) === false)
                    @method("put")
                @endif

                <input type="hidden" name="id" value="{{ $id }}">
                <input type="hidden" name="user_type_id" value="{{ $user_type_id }}">

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">Nome</label>
                            <input type="text" name="first_name" class="form-control" value="{{ isset($Model) ? $Model->first_name : old('first_name') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Sobrenome</label>
                            <input type="text" name="last_name" class="form-control" value="{{ isset($Model) ? $Model->last_name : old('last_name') }}" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" value="{{ isset($Model) ? $Model->email : old('email') }}" required>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirme sua senha</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                    </div>
                </div>     
                
                <div class="text-end">
                    <a href="{{ route('user.index', ['user_type_id' => $user_type_id]) }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
                    <button type="submit" class="btn btn-dark"><i class="fas fa-save me-2"></i> Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection