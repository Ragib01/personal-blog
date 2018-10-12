<div class="sidebar">

    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                Dashboard
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin_dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard <span class="badge badge-info">NEW</span></a>
            </li>

            <li class="divider"></li>


            <li class="nav-item">
                <a class="nav-link" href="{{route('admin_breaking_index')}}"><i class="fa fa-line-chart" aria-hidden="true"></i> Breaking</a>
            </li>

            <li class="divider"></li>

             <li class="nav-item">
                <a class="nav-link" href="{{route('admin_slider_index')}}"><i class="icon-puzzle"></i> Slider</a>
            </li>

            <li class="divider"></li>

            <li class="nav-title">
                Gallery
            </li>
           <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-th-list" aria-hidden="true"></i>Category</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin_gallery_category_create')}}" target="_top"><i class="fa fa-plus" aria-hidden="true"></i>Create Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin_gallery_category_index')}}" target="_top"><i class="icon-star"></i>All Categoy</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-picture-o" aria-hidden="true"></i>Images</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin_gallery_create')}}" target="_top"><i class="icon-star"></i>Insert Images</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin_gallery_index')}}" target="_top"><i class="icon-star"></i>All Images</a>
                    </li>
                </ul>
            </li>

             <li class="divider"></li>

            <li class="nav-title">
                Blog
            </li>
           <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-th-list" aria-hidden="true"></i>Category</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin_blog_category_create')}}" target="_top"><i class="fa fa-plus" aria-hidden="true"></i>Create Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin_blog_category_index')}}" target="_top"><i class="fa fa-list-alt" aria-hidden="true"></i>All Categoy</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-sticky-note" aria-hidden="true"></i>Posts</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin_blog_create')}}" target="_top"><i class="fa fa-plus" aria-hidden="true"></i>Create Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin_blog_index')}}" target="_top"><i class="fa fa-list-alt" aria-hidden="true"></i>All Posts</a>
                    </li>
                </ul>
            </li>

             <li class="divider"></li>

            <li class="nav-title">
                Research
            </li>
           <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-th-list" aria-hidden="true"></i>Category</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin_research_category_create')}}" target="_top"><i class="fa fa-plus" aria-hidden="true"></i>Create Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin_research_category_index')}}" target="_top"><i class="fa fa-list-alt" aria-hidden="true"></i>All Categoy</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-sticky-note" aria-hidden="true"></i>Posts</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin_research_create')}}" target="_top"><i class="fa fa-plus" aria-hidden="true"></i>Insert Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin_research_index')}}" target="_top"><i class="fa fa-list-alt" aria-hidden="true"></i>All Posts</a>
                    </li>
                </ul>
            </li>

             <li class="divider"></li>

            <li class="nav-title">
                Project
            </li>
           <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-th-list" aria-hidden="true"></i>Category</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin_project_category_create')}}" target="_top"><i class="fa fa-plus" aria-hidden="true"></i>Create Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin_project_category_index')}}" target="_top"><i class="fa fa-list-alt" aria-hidden="true"></i>All Categoy</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-sticky-note" aria-hidden="true"></i>Posts</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin_project_create')}}" target="_top"><i class="fa fa-plus" aria-hidden="true"></i>Insert Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin_project_index')}}" target="_top"><i class="fa fa-list-alt" aria-hidden="true"></i>All Posts</a>
                    </li>
                </ul>
            </li>

             <li class="divider"></li>
             <li class="nav-item">
                <a class="nav-link" href="{{route('admin_about_edit',['id' =>1])}}"><i class="fa fa-university" aria-hidden="true"></i> About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin_contact_edit',['id' =>1])}}"><i class="fa fa-phone" aria-hidden="true"></i> Contact</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin_mail_index') }}"><i class="fa fa-envelope" aria-hidden="true"></i>E-Mail</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin_user_list') }}"><i class="fa fa-users" aria-hidden="true"></i>User List</a>
            </li>
        </ul>
    </nav>
</div>