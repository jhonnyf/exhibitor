@extends('console.main')

@section('breadcrumb')
    <div class="row page-title">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="float-right mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Console</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Usuários</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Usuários</h4>
        </div>
    </div>
@endsection

@section('content')
    <div class="text-right mb-3">
        <a href="{{ route('user.form', ['user_type_id' => request()->get('user_type_id')]) }}" class="btn btn-dark"><i data-feather="plus"></i><span> Novo</a>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
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
                        @if ($list->exists())
                            @foreach ($list->get() as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->first_name }}</td>
                                    <td>{{ $item->last_name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <a href="{{ route('user.form', ['id' => $item->id]) }}"><i data-feather="edit"></i></a>
                                        <a href="{{ route('user.status', ['id' => $item->id]) }}">{!! $item->active  === 1 ? '<i data-feather="check-circle"></i>' : '<i data-feather="circle"></i>' !!}</a>
                                        <a href="{{ route('user.destroy', ['id' => $item->id]) }}"><i data-feather="trash-2"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">Nenhum registro foi encontrado!</td>
                            </tr>
                        @endif                
                    </tbody>            
                </table>
            </div>
        </div>
    </div>
@endsection