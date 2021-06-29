<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">            
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Console</a></li>
                <li class="breadcrumb-item"><a href="{{ route('content.index', ['category_id'=> $category_id]) }}">Páginas</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ is_null($id) ? 'Criação' : 'Edição' }}</li>
            </ol>
        </nav>
        <h4 class="mb-1 mt-0">Páginas - {{ is_null($id) ? 'Criação' : 'Edição' }}</h4>
    </div>
</div>