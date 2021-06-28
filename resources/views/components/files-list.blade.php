<div class="row">  
    @foreach ($files as $file)
        <div class="file col-md-4 mb-3">
            <div class="file-thumb">
                <img src="{{ asset("storage/{$file->file_path}") }}" class="img-fluid img-thumbnail">
                <div class="text-center mt-3">
                    <a href="{{ route('file.form', ['id' => $file->id]) }}" class="btn btn-dark act-form"><i class="fas fa-edit"></i></a>
                    <a href="{{ route('file.status', ['id' => $file->id]) }}" class="btn btn-dark act-status">{!! $file->active  === 1 ? '<i class="far fa-dot-circle"></i>' : '<i class="far fa-circle"></i>' !!}</a>
                    <a href="{{ route('file.destroy', ['id' => $file->id]) }}" class="btn btn-dark act-destroy"><i class="fas fa-trash"></i></a>
                </div>
            </div>
        </div>
    @endforeach
</div>