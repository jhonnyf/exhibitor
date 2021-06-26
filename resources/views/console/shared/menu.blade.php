<ul>
    <li><a href="{{ route('dashboard.index') }}"><i class="me-2 fas fa-tachometer-alt"></i> Dashbaord</a></li>
    <li>
        <a href="{{ route('dashboard.index') }}"><i class="me-2 fas fa-users"></i> Usuários</a>
        @php
            $UserTypes = \App\Models\UserType::where('active', '<>', 2)->get();
        @endphp
        @if ($UserTypes->count() > 0)
            <ul>
                @foreach ($UserTypes as $userType)
                    <li><a href="{{ route('user.index', ['user_type_id' => $userType->id]) }}">{{ $userType->user_type }}</a></li>
                @endforeach                
            </ul>    
        @endif        
    </li>
</ul>