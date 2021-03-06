<!-- ##### Header Area Start ##### -->
<header class="header-area" style="">
    <!-- Navbar Area -->
    <div class="delicious-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="deliciousNav">

                    <!-- Logo -->
                    <a class="nav-brand"
                       href="@if(\Illuminate\Support\Facades\Auth::check()) {{route('home')}} @else {{route('index')}}@endif"><img
                            src="source/img/logo.jpg" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <li><a href="#">Following Classes</a>
                                        @if(isset($roles))
                                            <ul class="dropdown">
                                                @foreach($roles as $role)
                                                    <li>
                                                        <a href="{{route('group.detail',$role->group->id)}}">{{$role->group->name}}</a>
                                                    </li>
                                                @endforeach()
                                                @endif

                                            </ul>
                                    </li>
                                @endif
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Help</a></li>
                                <li><a href="#" style="margin-right: 10px;">Contact</a></li>
                                @if(\Illuminate\Support\Facades\Auth::check())

                                    <div class="dropdown profile" style="float: right;">
                                        <a type="text" id="dropdownMenuButton" data-toggle="dropdown"
                                           aria-haspopup="true"
                                           aria-expanded="false">
                                            <img
                                                src="source/img/user/{{\Illuminate\Support\Facades\Auth::user()->avatar}}"
                                                style="width: 50px;height: 50px" id="avatar"/>
                                            <span
                                                style="font-weight:normal;color: black">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{route('profile')}}" id="home"> My
                                                Profile</a>
                                            <a class="dropdown-item" href="{{route('logout')}}"><img src=""> Log Out</a>
                                        </div>
                                    </div>


                                @else
                                    <li><a href="{{route('login.google.social')}}">Login</a></li>
                                @endif
                            </ul>

                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>                 <!-- header -->
</header>
<!-- ##### Header Area End ##### -->

