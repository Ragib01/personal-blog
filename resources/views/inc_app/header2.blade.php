
<header class="l-header">

    <div class="l-navbar l-navbar_expand l-navbar_t-light js-navbar-sticky">
        <div class="container-fluid">
            <nav class="menuzord js-primary-navigation" role="navigation" aria-label="Primary Navigation">

                <!--logo start-->
                <a href="{{ route('home_index') }}" class="logo-brand" style="color: #0f3e68">
                    Menu
                </a>
                <!--logo end-->

                <!--mega menu start-->
                <ul class="menuzord-menu menuzord-right c-nav_s-standard">
                    <li class="{{Request::is('/') ? "active" : ""}}"><a href="{{ route('home_index') }}">Home</a>
                    </li>
                    <li class="{{Request::is('blog') ? "active" : ""}}"><a href="{{ route('blog_index') }}">Blog</a>
                    </li>
                    <li class="{{Request::is('project') ? "active" : ""}}"><a href="{{ route('project_index') }}">Projects</a>
                    </li>
                    <li class="{{Request::is('research') ? "active" : ""}}"><a href="{{ route('research_index') }}">Research</a>
                    </li>
                    <li class="{{Request::is('gallery') ? "active" : ""}}"><a href="{{ route('gallery_index') }}">Gallery</a>
                    </li>
                    <li class="{{Request::is('about') ? "active" : ""}}"><a href="{{route('about_index')}}">About</a>
                    </li>
                    <li class="{{Request::is('contact') ? "active" : ""}}"><a href="{{route('contact_index')}}">Contact</a>
                    </li>

                </ul>
                <!--mega menu end-->

            </nav>
        </div>
    </div>

</header>