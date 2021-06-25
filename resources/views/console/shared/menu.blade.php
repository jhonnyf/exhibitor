<ul>
    <li><a href="{{ route('dashboard.index') }}"><i class="me-2 fas fa-tachometer-alt"></i> Dashbaord</a></li>
    <li>
        <a href="{{ route('dashboard.index') }}"><i class="me-2 fas fa-users"></i> Usuários</a>
        <ul>
            <li><a href="{{ route('user.index') }}">Administradores</a></li>
            <li><a href="{{ route('user.index') }}">Exibidores</a></li>
        </ul>
    </li>
</ul>