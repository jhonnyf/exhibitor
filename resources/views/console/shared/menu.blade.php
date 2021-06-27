<ul>
    <li><a href="{{ route('dashboard.index') }}"><i class="me-2 fas fa-tachometer-alt"></i> Dashbaord</a></li>
    <li>
        <a href="javascript:;"><i class="me-2 fas fa-users"></i> Usuários</a>
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
    <li>
        <a href="javascript:;"><i class="me-2 fas fa-sitemap"></i> Páginas</a>
        @php
            $Categories = \App\Models\Category::find(2)->categorySecondary()->get();
        @endphp
        @if ($Categories->count() > 0)
            <ul>
                @foreach ($Categories as $category)
                    <li><a href="{{ route('content.index', ['category_id' => $category->id]) }}">{{ $category->contents()->first()->title }}</a></li>
                @endforeach                
            </ul>    
        @endif
    </li>
</ul>