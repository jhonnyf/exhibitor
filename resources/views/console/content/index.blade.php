@extends('console.main')

@section('breadcrumbs')
    <x-breadcrumbs />
@endsection

@section('content')
    <div class="header">
        <div class="new-register text-end">
            <a href="{{ route('content.form', ['category_id' => request()->get('category_id')]) }}" class="btn btn-dark"><i class="fas fa-plus"></i> Novo</a>
        </div>
    </div>
    <div class="body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @if ($list->exists())
                    @foreach ($list->get() as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>                            
                            <td>
                                <a href="{{ route('content.form', ['id' => $item->id]) }}"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('content.status', ['id' => $item->id]) }}">{!! $item->active  === 1 ? '<i class="far fa-dot-circle"></i>' : '<i class="far fa-circle"></i>' !!}</a>
                                <a href="{{ route('content.destroy', ['id' => $item->id]) }}"><i class="fas fa-trash"></i></a>
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
@endsection