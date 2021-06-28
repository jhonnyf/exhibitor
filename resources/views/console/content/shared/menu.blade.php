<ul>
    @if (is_null($id) === false)
        <li><a href="{{ route('content.form', ['id' => $Model->id]) }}">Principal</a></li>        
        <li><a href="{{ route('file.gallery', ['module' => 'content', 'id' => $Model->id, 'category_id' => request()->get('category_id')]) }}">Arquivos</a></li>
    @else 
        <li>Principal</li>
    @endif
</ul>