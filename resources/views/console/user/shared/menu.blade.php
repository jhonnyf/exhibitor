<ul>
    @if (is_null($id) === false)
        <li><a href="{{ route('user.form', ['id' => $Model->id]) }}">Principal</a></li>
        <li><a href="{{ route('user.other', ['id' => $Model->id]) }}">Outros</a></li>
        <li><a href="{{ route('file.gallery', ['module' => 'user', 'id' => $Model->id]) }}">Arquivos</a></li>
    @else 
        <li>Principal</li>
    @endif
</ul>