<div class="card">
    <div class="card-body">
        <ul class="list-unstyled">
            @if (is_null($id) === false)
                <li><a class="btn btn-dark mb-2 d-block" href="{{ route('user.form', ['id' => $Model->id]) }}">Principal</a></li>
                <li><a class="btn btn-dark mb-2 d-block" href="{{ route('user.other', ['id' => $Model->id]) }}">Outros</a></li>
                <li><a class="btn btn-dark mb-2 d-block" href="{{ route('file.gallery', ['module' => 'user', 'id' => $Model->id]) }}">Arquivos</a></li>
            @else 
                <li class="btn btn-dark mb-2 d-block">Principal</li>
            @endif
        </ul>
    </div>
</div>