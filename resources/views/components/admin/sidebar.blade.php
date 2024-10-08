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
                @canany(['category_access'])
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-tags"></i>
                            <span>Categories</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @can('category_create')
                                <li>
                                    <a href="{{ route('admin.categories.create') }}">
                                        New Categories
                                    </a>
                                </li>
                            @endcan
                            @can('category_create')
                                <li>
                                    <a href="{{ route('admin.categories.index') }}">
                                        All Categories
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
                @canany(['course_access'])
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-graduation-cap"></i>
                            <span>Courses</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @can('course_create')
                                <li>
                                    <a href="{{ route('admin.courses.create') }}">
                                        New Courses
                                    </a>
                                </li>
                            @endcan
                            @can('course_access')
                                <li>
                                    <a href="{{ route('admin.courses.index') }}">
                                        All Courses
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
                @can('coupon_access')
                    <li>
                        <a href="{{ route('admin.coupons.index') }}" class="waves-effect">
                            <i class="fa fa-gifts"></i>
                            <span>Coupon</span>
                        </a>
                    </li>
                @endcan

                @can('order_access')
                    <li>
                        <a href="{{ route('admin.orders.index') }}" class="waves-effect">
                            <i class="fas fa-cart-plus"></i>
                            <span>Orders</span>
                        </a>
                    </li>
                @endcan

                @can('queries_access')
                    <li>
                        <a href="{{ route('admin.queries.index') }}" class="waves-effect">
                            <i class="fas fa-question-circle"></i>
                            <span>Queries</span>
                        </a>
                    </li>
                @endcan


                <li class="menu-title">Manage CMS</li>
                @canany(['ebook_category_access', 'ebook_download_access'])
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-book"></i>
                            <span>Manage E-Books</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @can('ebook_category_create')
                                <li><a href="{{ route('admin.ebooks.categories.create') }}">New Category</a></li>
                            @endcan

                            @can('ebook_category_access')
                                <li><a href="{{ route('admin.ebooks.categories.index') }}">All Categories</a></li>
                            @endcan
                            @can('ebook_category_create')
                                <li><a href="{{ route('admin.ebooks.create') }}">New E-Book</a></li>
                            @endcan

                            @can('ebook_category_access')
                                <li><a href="{{ route('admin.ebooks.index') }}">All E-Books</a></li>
                            @endcan

                            @can('ebook_download_access')
                                <li><a href="{{ route('admin.ebooks.downloads.index') }}">All Downloads</a></li>
                            @endcan
                        </ul>
                    </li>
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

                @canany(['faculties_access', 'faculties_create'])
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-users"></i>
                            <span>Faculty</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @can('faculties_create')
                                <li><a href="{{ route('admin.faculties.create') }}">New Faculty</a></li>
                            @endcan

                            @can('faculties_access')
                                <li><a href="{{ route('admin.faculties.index') }}">All Faculty</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcanany

                @canany(['banners_access', 'banners_create'])
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-users"></i>
                            <span>Banner</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @can('banners_create')
                                <li><a href="{{ route('admin.banners.create') }}">New Banner</a></li>
                            @endcan

                            @can('banners_access')
                                <li><a href="{{ route('admin.banners.index') }}">All Banner</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
                @canany(['reviews_access', 'reviews_create'])
                <x-areviews-areviews:admin-sidebar-links />
                @endcanany

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

                @canany(['setting_access'])
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fa fa-cog"></i>
                            <span>Settings</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @can('setting_access')
                                <li>
                                    <a href="{{ route('admin.settings.index') }}" class="active">
                                        General Settings
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.settings.notices') }}" class="active">
                                        Notice Settingss
                                    </a>
                                </li>
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

                @if(config('site.blog.routes.default', true) && config('site.blog.routes.sections.admin', true))
                    <li class="menu-title">Manage Blog Posts</li>
                    @canany(['blog_categories_access', 'blog_categories_create'])
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-tags"></i>
                            <span>Blog Categories</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @can('blog_categories_create')
                            <li><a href="{{ route('admin.blog.categories.create') }}">New Category</a></li>
                            @endcan

                            @can('blog_categories_access')
                            <li><a href="{{ route('admin.blog.categories.index') }}">All Categories</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcanany

                    @canany(['blog_posts_access', 'blog_posts_create'])
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-blog"></i>
                            <span>Blog Posts</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @can('blog_posts_access')
                            <li><a href="{{ route('admin.blog.posts.create') }}">Create Post</a></li>
                            @endcan

                            @can('blog_posts_create')
                            <li><a href="{{ route('admin.blog.posts.index') }}">All Posts</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcanany

                    @if (config('site.blog.comments'))
                        @can('blog_comments_access')
                        <li>
                            <a href="{{ route('admin.blog.comments.index') }}" class="waves-effect">
                                <i class="fas fa-comments"></i>
                                <span>Blog Comments</span>
                            </a>
                        </li>
                        @endcan
                    @endif
                @endif

			</ul>
        </div>
    </div>
</div>
