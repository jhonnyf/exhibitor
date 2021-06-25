@extends('console.main')

@section('breadcrumbs')
    <x-breadcrumbs />
@endsection

@section('content')
    <div class="header">
        <div class="new-register text-end">
            <a href="{{ route('user.form') }}" class="btn btn-dark"><i class="fas fa-plus"></i> Novo</a>
        </div>
    </div>
    <div class="body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>E-mail</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Jhonny</td>
                    <td>Fialho</td>
                    <td>jhonnyf@live.com</td>
                    <td>
                        <a href="{{ route('user.form') }}"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('user.status', ['id' => 1]) }}"><i class="far fa-circle"></i> <i class="far fa-dot-circle"></i> </a>
                        <a href="{{ route('user.destroy', ['id' => 1]) }}"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>            
        </table>
    </div>
@endsection