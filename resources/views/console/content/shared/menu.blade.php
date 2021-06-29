<div class="card">
    <div class="card-body">
        <ul class="list-unstyled">
            @if (is_null($id) === false)
                <li><a class="btn btn-dark mb-2 d-block" href="{{ route('content.form', ['id' => $Model->id]) }}">Principal</a></li>        
                <li><a class="btn btn-dark mb-2 d-block" href="{{ route('file.gallery', ['module' => 'content', 'id' => $Model->id, 'category_id' => request()->get('category_id')]) }}">Arquivos</a></li>
            @else 
                <li class="btn btn-dark mb-2 d-block">Principal</li>
            @endif
        </ul>
    </div>
</div>