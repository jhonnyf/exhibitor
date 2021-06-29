@extends('console.main')

@section('css')
    <link href="{{ URL::asset('assets/console/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/console/libs/fancybox/fancybox.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
    @include("console.{$module}.shared.breadcrumb")
@endsection

@section('content')   

    <div class="row">
        <div class="col-md-2">
            @include("console.{$module}.shared.menu")
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <x-response-form />

                    <ul class="nav nav-tabs mb-3    ">
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
                    
                    @if(isset($file_gallery_id))
                        <form action="{{ route('file.upload', ['module' => $module, 'id' => $id, 'file_gallery_id' => $file_gallery_id]) }}" method="POST" class="dropzone mt-3 mb-3">
                            @csrf
                            <div class="dz-message needsclick">
                                <i class="h1 text-muted  uil-cloud-upload"></i>
                                <h3>Solte os arquivos aqui ou clique para fazer o upload.</h3>
                                <span class="text-muted font-13">(Arquivos com no máximo 4MB)</span>
                            </div>
                        </form>    
                        
                        <div class="files-list">
                            <x-files-list :files="$files"/>
                        </div>
                    @else
                        <p class="text-center">Selecione uma galeria para fazer o upload do seu arquivo</p>
                    @endisset            

                    <div class="text-right">
                        <a href="{{ $url_back }}" class="btn btn-light"><i class="fas fa-arrow-left"></i> Voltar</a>
                    </div>   
                </div>
            </div>         
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ URL::asset('assets/console/libs/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ URL::asset('assets/console/libs/fancybox/fancybox.min.js') }}"></script>
@endsection

@section('script-bottom')
    <script src="{{ URL::asset('assets/console/js/pages/file.init.js') }}"></script>
    <script src="{{ URL::asset('assets/console/js/pages/form.init.js') }}"></script>
@endsection