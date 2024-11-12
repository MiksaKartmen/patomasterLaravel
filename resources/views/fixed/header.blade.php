<header>
    <!-- Header desktop -->
    <div class="wrap-menu-header gradient1 trans-0-4">
        <div class="container h-full">
            <div class="wrap_header trans-0-3">
                <!-- Logo -->
                <div class="logo">
                    <a href="index.html">
                        <img src="{{asset("assets/images/icons/logo.png")}}" alt="IMG-LOGO" data-logofixed="{{asset("assets/images/icons/logo.png")}}">
                    </a>
                </div>
                <!-- Menu -->
                <div class="wrap_menu p-l-45 p-l-0-xl">
                    <nav class="menu">
                        <ul class="main_menu">
                            @foreach($navigations as $link)
                                <li class="nav-item">
                                    <a href="{{ route($link->href) }}">{{ $link->title }}</a>
                                </li>
                            @endforeach
                            @if(!Auth::check())
                                <li class="nav-item">
                                    <a href="{{ route('login') }}">Log in</a>
                                </li>
                            @else
                                @if(Auth::user()->role_id == "2")
                                        <li class="nav-item">
                                            <a href="{{ route('admin.index') }}">Admin</a>
                                        </li>
                                @endif

                                <li class="nav-item">
                                    <a href="{{ route('profile') }}">Profile</a>
                                </li>

                                <li class="nav-item">
                                    <form action="{{route('login.logout')}}" method="POST" id="logoutForm">
                                        @csrf
                                        <a href="{{route('login.logout')}}" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                                            Logout
                                        </a>
                                    </form>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>

                <!-- Social -->
                {{--<div class="social flex-w flex-l-m p-r-20">


                    <button class="btn-show-sidebar m-l-33 trans-0-4"></button>
                </div>--}}
            </div>
        </div>
    </div>
</header>
<aside class="sidebar trans-0-4">
    <!-- Button Hide sidebar -->
    <button class="btn-hide-sidebar ti-close color0-hov trans-0-4"></button>

    <!-- - -->
    <ul class="menu-sidebar p-t-95 p-b-70">
        @foreach($navigations as $link)
            <li class="t-center m-b-13">
                <a class="txt19" href="{{ route($link->href) }}">{{ $link->title }}</a>
            </li>
        @endforeach

    </ul>

    <!-- - -->
    <div class="gallery-sidebar t-center p-l-60 p-r-60 p-b-40">
        <!-- - -->
        <h4 class="txt20 m-b-33">
            Gallery
        </h4>

        <!-- Gallery -->
       {{-- <div class="wrap-gallery-sidebar flex-w">
            <a class="item-gallery-sidebar wrap-pic-w" href="images/photo-gallery-01.jpg" data-lightbox="gallery-footer">
                <img src="images/photo-gallery-thumb-01.jpg" alt="GALLERY">
            </a>

            <a class="item-gallery-sidebar wrap-pic-w" href="images/photo-gallery-02.jpg" data-lightbox="gallery-footer">
                <img src="images/photo-gallery-thumb-02.jpg" alt="GALLERY">
            </a>

            <a class="item-gallery-sidebar wrap-pic-w" href="images/photo-gallery-03.jpg" data-lightbox="gallery-footer">
                <img src="images/photo-gallery-thumb-03.jpg" alt="GALLERY">
            </a>

            <a class="item-gallery-sidebar wrap-pic-w" href="images/photo-gallery-05.jpg" data-lightbox="gallery-footer">
                <img src="images/photo-gallery-thumb-05.jpg" alt="GALLERY">
            </a>

            <a class="item-gallery-sidebar wrap-pic-w" href="images/photo-gallery-06.jpg" data-lightbox="gallery-footer">
                <img src="images/photo-gallery-thumb-06.jpg" alt="GALLERY">
            </a>

            <a class="item-gallery-sidebar wrap-pic-w" href="images/photo-gallery-07.jpg" data-lightbox="gallery-footer">
                <img src="images/photo-gallery-thumb-07.jpg" alt="GALLERY">
            </a>

            <a class="item-gallery-sidebar wrap-pic-w" href="images/photo-gallery-09.jpg" data-lightbox="gallery-footer">
                <img src="images/photo-gallery-thumb-09.jpg" alt="GALLERY">
            </a>

            <a class="item-gallery-sidebar wrap-pic-w" href="images/photo-gallery-10.jpg" data-lightbox="gallery-footer">
                <img src="images/photo-gallery-thumb-10.jpg" alt="GALLERY">
            </a>

            <a class="item-gallery-sidebar wrap-pic-w" href="images/photo-gallery-11.jpg" data-lightbox="gallery-footer">
                <img src="images/photo-gallery-thumb-11.jpg" alt="GALLERY">
            </a>
        </div>--}}
    </div>
</aside>
