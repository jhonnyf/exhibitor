<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
    <div class="media user-profile mt-2 mb-2">
        {{-- <img src="{{ URL::asset('assets/console/images/users/avatar-7.jpg') }}" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
        <img src="{{ URL::asset('assets/console/images/users/avatar-7.jpg') }}" class="avatar-xs rounded-circle mr-2" alt="Shreyu" /> --}}        

        <div class="media-body">
            <h6 class="pro-user-name mt-0 mb-0">{{ Auth::user()->first_name }}</h6>
            <span class="pro-user-desc">{{ Auth::user()->user_type->user_type }}</span>
        </div>
        <div class="dropdown align-self-center profile-dropdown-menu">
            <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <span data-feather="chevron-down"></span>
            </a>
            <div class="dropdown-menu profile-dropdown">
                <a href="{{ route('user.form', ['id' => Auth::user()->id]) }}" class="dropdown-item notify-item">
                    <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                    <span>Minha Conta</span>
                </a>             

                <div class="dropdown-divider"></div>

                <a href="{{ route('login.logout') }}" class="dropdown-item notify-item">
                    <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </div>
    <div class="sidebar-content">
        <!--- Sidemenu -->
        <div id="sidebar-menu" class="slimscroll-menu">
            @include('console.layouts.shared.app-menu')
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->