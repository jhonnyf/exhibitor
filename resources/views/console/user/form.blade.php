@extends('console.main')

@section('breadcrumbs')
    <x-breadcrumbs />
@endsection

@section('content')
    <form action="{{ route('user.store') }}" method="post">
        <input type="hidden" name="id" value="{{ $id }}">

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="first_name" class="form-label">Nome</label>
                    <input type="text" name="first_name" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="last_name" class="form-label">Sobrenome</label>
                    <input type="text" name="last_name" class="form-control">
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control">
        </div>

        <hr>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="password" class="form-label">Confirme sua senha</label>
                    <input type="password" name="password" class="form-control">
                </div>
            </div>
        </div>     
        
        <div class="text-end">
            <button type="submit" class="btn btn-dark"><i class="fas fa-save me-2"></i> Salvar</button>
        </div>
    </form>
@endsection