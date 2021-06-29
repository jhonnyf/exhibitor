<ul class="metismenu" id="menu-bar">
    <li>
        <a href="{{ route('dashboard.index') }}"><i data-feather="home"></i><span> Dashboard </span></a>
    </li>
    <li>
        <a href="javascript: void(0);"><i data-feather="users"></i><span> Usuários </span><span class="menu-arrow"></span></a>        
        @php
            $UserTypes = \App\Models\UserType::where('active', '<>', 2)->get();
        @endphp
        @if ($UserTypes->count() > 0)
            <ul class="nav-second-level" aria-expanded="false">
                @foreach ($UserTypes as $userType)
                    <li><a href="{{ route('user.index', ['user_type_id' => $userType->id]) }}">{{ $userType->user_type }}</a></li>
                @endforeach                
            </ul>    
        @endif
    </li>
    <li>
        <a href="javascript: void(0);"><i data-feather="file"></i> <span>Páginas</span><span class="menu-arrow"></span></a>
        @php
            $Categories = \App\Models\Category::find(2)->categorySecondary()->get();
        @endphp
        @if ($Categories->count() > 0)
            <ul class="nav-second-level" aria-expanded="false">
                @foreach ($Categories as $category)
                    <li><a href="{{ route('content.index', ['category_id' => $category->id]) }}">{{ $category->contents()->first()->title }}</a></li>
                @endforeach                
            </ul>    
        @endif
    </li>
</ul>
