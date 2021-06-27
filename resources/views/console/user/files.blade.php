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

            <ul class="nav nav-tabs">
                @foreach ($FilesGalleries as $fileGallery)
                    <li class="nav-item">
                        <a class="nav-link {{ $fileGallery->id == request()->get('file_gallery_id') ? 'active' : ''}}" aria-current="page" href="{{ route('user.file', ['id' => $id, 'file_gallery_id' => $fileGallery->id]) }}">{{ $fileGallery->file_gallery }}</a>
                    </li>                
                @endforeach                
            </ul>
            
            @isset($file_gallery_id)
                <form action="{{ route('user.upload', ['id' => $id, 'file_gallery_id' => $file_gallery_id]) }}" class="dropzone mt-3 mb-3">
                    @csrf
                </form>    
                
                <div class="files-list">
                    <x-files-list :file="$Model->files()" :fileGalleryId="$file_gallery_id" :userId="$Model->id" />
                </div>
            @endisset            

            <div class="text-end">
                <a href="{{ route('user.index', ['user_type_id' => $user_type_id]) }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
            </div>            
        </div>
    </div>
@endsection