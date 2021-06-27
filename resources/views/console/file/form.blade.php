<form action="{{ route('file.update', ['id' => $id]) }}" class="form-ajax" method="post" autocomplete="off">
    @csrf
    @method("put")

    <input type="hidden" name="id" value="{{ $id }}">

    <div class="mb-3">
        <label for="title" class="form-label">Título</label>
        <input type="text" name="title" class="form-control" value="{{ isset($Model) ? $Model->title : old('title') }}">
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Conteúdo</label>
        <textarea name="content" class="form-control">{{ isset($Model) ? $Model->content : old('content') }}</textarea>
    </div>
    
    <div class="text-end">
        <button type="submit" class="btn btn-dark"><i class="fas fa-save me-2"></i> Salvar</button>
    </div>
</form>