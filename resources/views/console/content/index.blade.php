@extends('console.main')

@section('breadcrumb')
    <div class="row page-title">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="float-right mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Console</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Páginas</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Páginas</h4>
        </div>
    </div>
@endsection

@section('content')
    <div class="text-right mb-3">
        <a href="{{ route('content.form', ['category_id' => request()->get('category_id')]) }}" class="btn btn-dark"><i class="fas fa-plus"></i> Novo</a>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="first">ID</th>
                            <th>Título</th>
                            <th class="last">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($list->exists())
                            @foreach ($list->get() as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>                            
                                    <td>
                                        <a href="{{ route('content.form', ['id' => $item->id]) }}"><i data-feather="edit"></i></a>
                                        <a href="{{ route('content.status', ['id' => $item->id]) }}">{!! $item->active  === 1 ? '<i data-feather="check-circle"></i>' : '<i data-feather="circle"></i>' !!}</a>
                                        <a href="{{ route('content.destroy', ['id' => $item->id]) }}"><i data-feather="trash-2"></i></a>
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