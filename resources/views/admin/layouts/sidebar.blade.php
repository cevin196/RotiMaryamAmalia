<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="{{asset('admin/assets/images/logo/logo.png')}}" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item {{(Route::currentRouteName()=='admin.home')?'active':''}}">
                    <a href="{{route('admin.home')}}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item {{str_contains(Route::currentRouteName(), 'menu') ? 'active' : '' }}">
                    <a href="{{route('menu.index')}}" class='sidebar-link'>
                        <i class="bi bi-book"></i>
                        <span>Menu</span>
                    </a>
                </li>

                <li class="sidebar-item {{str_contains(Route::currentRouteName(),'pesanan')?'active': ''}} ">
                    <a href="{{route('pesanan.index')}}" class='sidebar-link'>
                        <i class="bi bi-clipboard"></i>
                        <span>Pesanan</span>
                    </a>
                </li>

                <li class="sidebar-item {{str_contains(Route::currentRouteName(),'riwayat')?'active': ''}}">
                    <a href="{{route('riwayat')}}" class='sidebar-link'>
                        <i class="bi bi-clock-history"></i>
                        <span>Riwayat</span>
                    </a>
                </li>


                <li class="sidebar-title">Users & Account</li>

                <li class="sidebar-item ">
                    <a href="index.html" class='sidebar-link'>
                        <i class="bi bi-person-circle"></i>
                        <span>Akun</span>
                    </a>
                </li>
                
                <li class="sidebar-item">
                    <a href="index.html" class='w-100 btn btn-danger text-center' 
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
