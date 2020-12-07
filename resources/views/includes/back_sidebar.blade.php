<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Panel</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if($main_menu == 'Dashboard') active @endif">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item @if($main_menu == 'Slider') active @endif">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sliders" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Slider</span>
        </a>
        <div id="sliders" class="collapse @if($main_menu == 'Slider') show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item @if($main_menu == 'Slider') active @endif" href="{{route('slider.index')}}">Slider</a>
            </div>
        </div>
    </li>

    <li class="nav-item @if($main_menu == 'About') active @endif">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#About" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>About</span>
        </a>
        <div id="About" class="collapse @if($main_menu == 'About') show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item @if($main_menu == 'About') active @endif" href="{{route('about-us')}}">About Us</a>
            </div>
        </div>
    </li>
    <li class="nav-item @if($main_menu == 'Post') active @endif">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#post" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-table"></i>
            <span>Post</span>
        </a>
        <div id="post" class="collapse @if($main_menu == 'Post') show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item @if($sub_menu == 'Cat') active @endif" href="{{route('category.index')}}">Category</a>
                <a class="collapse-item @if($sub_menu == 'Post') active @endif" href="{{route('post.index')}}">Posts</a>
            </div>
        </div>
    </li>
    <li class="nav-item @if($main_menu == 'Site') active @endif">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#site" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-globe"></i>
            <span>Site Identity</span>
        </a>
        <div id="site" class="collapse @if($main_menu == 'Site') show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item @if($sub_menu == 'Site') active @endif" href="{{route('site.identity')}}">Logo & Footer</a>
                <a class="collapse-item @if($sub_menu == 'Social') active @endif" href="{{route('social.link')}}">Social Links</a>
            </div>
        </div>
    </li>

    <li class="nav-item @if($main_menu == 'Users') active @endif">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Users" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-users"></i>
            <span>Users</span>
        </a>
        <div id="Users" class="collapse @if($main_menu == 'Users') show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded"></a>
                <a class="collapse-item @if($sub_menu == 'Profile') active @endif" href="{{route('admin.profile')}}">My Profile</a>
                <a class="collapse-item @if($sub_menu == 'Update') active @endif" href="{{route('admin.update')}}">Update Profile</a>
                @if(Auth::user()->status == 1)
                <a class="collapse-item @if($sub_menu == 'Users') active @endif" href="{{route('admin.index')}}">Manage Users</a>
                    @endif
            </div>
        </div>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->