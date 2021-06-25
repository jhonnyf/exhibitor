<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <h1 class="logo"><a href="{{ route('dashboard.index') }}">Console</a></h1>
            </div>
            <div class="col-md-10">
                <div class="actions">
                    <span class="wellcome">Olá, <strong>Jhonny Fialho</strong></span>
                    <a href="{{ route('console.logoff') }}" class="logoff"><i class="fas fa-sign-out-alt"></i> Sair</a>
                </div>
            </div>
        </div>
    </div>
</header>