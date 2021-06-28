@extends('console.main')

@section('breadcrumbs')
    <x-breadcrumbs />
@endsection

@section('content')
    <h2 class="title-form mb-4">{{ is_null($id) ? 'Criação' : 'Edição' }}</h2>

    <div class="row">
        <div class="col-md-2">
            @include("console.{$module}.shared.menu")
        </div>
        <div class="col-md-10">
            <x-response-form />

            <ul class="nav nav-tabs">
                @foreach ($FilesGalleries as $fileGallery)
                    <li class="nav-item">
                        @php
                            $route_params = $request_params;

                            $route_params['module'] = $module;
                            $route_params['id']  = $id;
                            $route_params['file_gallery_id']  = $fileGallery->id;
                            
                        @endphp
                        <a class="nav-link {{ $fileGallery->id == request()->get('file_gallery_id') ? 'active' : ''}}" aria-current="page" href="{{ route('file.gallery', $route_params) }}">{{ $fileGallery->file_gallery }}</a>
                    </li>                
                @endforeach                
            </ul>
            
            @isset($file_gallery_id)
                <form action="{{ route('file.upload', ['module' => $module, 'id' => $id, 'file_gallery_id' => $file_gallery_id]) }}" class="dropzone mt-3 mb-3">
                    @csrf
                </form>    
                
                <div class="files-list">
                    <x-files-list :files="$files"/>
                </div>
            @endisset            

            <div class="text-end">
                <a href="{{ $url_back }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
            </div>            
        </div>
    </div>
@endsection