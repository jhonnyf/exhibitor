@extends('console.main')

@section('breadcrumb')
    @include('console.user.shared.breadcrumb')
@endsection

@section('content')    

    <div class="row">
        <div class="col-md-2">
            @include('console.user.shared.menu')
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <x-response-form />            
                    <form action="{{ is_null($id) ?  : route('user.other-update', ['id' => $id]) }}" method="post" autocomplete="off">
                        @csrf
                        @method("put")
                        <input type="hidden" name="id" value="{{ $id }}">

                        <div class="mb-3">
                            <label for="first_name" class="form-label">Biografia</label>                    
                            <textarea name="bio" class="form-control" id="bio" required>{{ isset($Model) ? $Model->other->bio : old('bio') }}</textarea>
                        </div>
                        
                        <div class="text-right">
                            <a href="{{ route('user.index', ['user_type_id' => $user_type_id]) }}" class="btn btn-light"><i class="fas fa-arrow-left"></i> Voltar</a>
                            <button type="submit" class="btn btn-dark"><i class="fas fa-save me-2"></i> Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection