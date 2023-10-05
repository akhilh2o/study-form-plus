<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                {{-- adash-dashboard --}}
                <li class="menu-title">Admin Main</li>
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                {{-- end adash-dashboard --}}

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-blog"></i>
                        <span>Master</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.categories.create') }}" class="btn-loader">New Category</a></li>
                        <li><a href="{{ route('admin.categories.index') }}" class="btn-loader">All Categories</a></li>
                        <li><a href="{{ route('admin.courses.create') }}" class="btn-loader">New Course</a></li>
                        <li><a href="{{ route('admin.courses.index') }}" class="btn-loader">All Courses</a></li>
                    </ul>
                </li>


                @can('queries_access')
                    <li>
                        <a href="{{ route('admin.queries.index') }}" class="waves-effect">
                            <i class="fas fa-question-circle"></i>
                            <span>Queries</span>
                        </a>
                    </li>
                @endcan

                @canany(['roles_access', 'permissions_access', 'users_access'])
                    <li class="menu-title">Manage Users</li>
                    @can('roles_access')
                        <li>
                            <a href="{{ route('admin.roles.index') }}" class="waves-effect">
                                <i class="fas fa-users-cog"></i>
                                <span>All Roles</span>
                            </a>
                        </li>
                    @endcan

                    @can('permissions_access')
                        <li>
                            <a href="{{ route('admin.permissions.index') }}" class="waves-effect">
                                <i class="fas fa-user-shield"></i>
                                <span>All Permissions</span>
                            </a>
                        </li>
                    @endcan

                    @can('users_access')
                        <li>
                            <a href="{{ route('admin.users.index') }}" class="waves-effect">
                                <i class="fas fa-users"></i>
                                <span>All Users</span>
                            </a>
                        </li>
                    @endcan
                @endcanany

                @canany(['faqs_access', 'faqs_create'])
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-question"></i>
                            <span>Manage FAQs</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @can('faqs_create')
                                <li><a href="{{ route('admin.faqs.create') }}">New FAQ</a></li>
                            @endcan

                            @can('faqs_access')
                                <li><a href="{{ route('admin.faqs.index') }}">All FAQs</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcanany

                @canany(['pages_create', 'pages_access'])
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-file"></i>
                            <span>Manage Pages</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @can('pages_create')
                                <li><a href="{{ route('admin.pages.create') }}">New Page</a></li>
                            @endcan

                            @can('pages_access')
                                <li><a href="{{ route('admin.pages.index') }}">All Pages</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
                @canany(['testimonials_access', 'testimonials_create'])
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-comment-dots"></i>
                            <span>Testimonials</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @can('testimonials_create')
                                <li><a href="{{ route('admin.testimonials.create') }}">New Testimonial</a></li>
                            @endcan

                            @can('testimonials_access')
                                <li><a href="{{ route('admin.testimonials.index') }}">All Testimonials</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcanany

                <li class="menu-title">Manage Account</li>
                <li>
                    <a href="{{ route('admin.profile.edit') }}" class=" waves-effect">
                        <i class="fas fa-user"></i>
                        <span>Update Profile</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" class=" waves-effect"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off"></i>
                        <span>Logout</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
