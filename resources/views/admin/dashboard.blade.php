<x-admin.layout>
    <x-admin.breadcrumb title='Dashboard' :links="[['text' => 'Dashboard']]" />


    <div class="row">
        @can('category_access')
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-dark text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-left mini-stat-img mr-4 font-white font-20">
                                <i class="fas fa-tags"></i>
                            </div>
                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Categories</h5>
                            <h4 class="font-weight-medium font-size-24">
                                {{ $categories_count }}
                                <i class="fas fa-arrow-up text-success ml-2"></i>
                            </h4>
                        </div>
                        <div class="pt-2">
                            <div class="float-right">
                                <a href="{{ route('admin.categories.index') }}" class="text-white-50 stretched-link"><i
                                        class="fas fa-arrow-right h5"></i></a>
                            </div>

                            <p class="text-white-50 mb-0 mt-1">Till Today</p>
                        </div>
                    </div>
                </div>
            </div>
        @endcan

        @can('course_access')
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-success text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-left mini-stat-img mr-4 font-white font-20">
                                <i class="fas fa-blog"></i>
                            </div>
                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Course</h5>
                            <h4 class="font-weight-medium font-size-24">
                                {{ $courses_count }}
                                <i class="fas fa-arrow-up text-success ml-2"></i>
                            </h4>
                        </div>
                        <div class="pt-2">
                            <div class="float-right">
                                <a href="{{ route('admin.courses.index') }}" class="text-white-50 stretched-link"><i
                                        class="fas fa-arrow-right h5"></i></a>
                            </div>

                            <p class="text-white-50 mb-0 mt-1">Till Today</p>
                        </div>
                    </div>
                </div>
            </div>
        @endcan

        @can('order_access')
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-info text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-left mini-stat-img mr-4 font-white font-20">
                                <i class="fas fa-comments"></i>
                            </div>
                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Orders</h5>
                            <h4 class="font-weight-medium font-size-24">
                                {{ $orders_count }}
                                <i class="fas fa-arrow-up text-success ml-2"></i>
                            </h4>
                        </div>
                        <div class="pt-2">
                            <div class="float-right">
                                <a href="{{ route('admin.orders.index') }}" class="text-white-50 stretched-link"><i
                                        class="fas fa-arrow-right h5"></i></a>
                            </div>

                            <p class="text-white-50 mb-0 mt-1">Till Today</p>
                        </div>
                    </div>
                </div>
            </div>
        @endcan

        @can('faculties_access')
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-left mini-stat-img mr-4 font-white font-20">
                                <i class="fas fa-question"></i>
                            </div>
                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Faculties</h5>
                            <h4 class="font-weight-medium font-size-24">
                                {{ $faculties_count }}
                                <i class="fas fa-arrow-up text-success ml-2"></i>
                            </h4>
                        </div>
                        <div class="pt-2">
                            <div class="float-right">
                                <a href="{{ route('admin.faculties.index') }}" class="text-white-50 stretched-link"><i
                                        class="fas fa-arrow-right h5"></i></a>
                            </div>

                            <p class="text-white-50 mb-0 mt-1">Till Today</p>
                        </div>
                    </div>
                </div>
            </div>
        @endcan

        @can('users_access')
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-left mini-stat-img mr-4 font-white font-20">
                                <i class="fas fa-users"></i>
                            </div>
                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Users</h5>
                            <h4 class="font-weight-medium font-size-24">
                                {{ $users_count }}
                                <i class="fas fa-arrow-up text-success ml-2"></i>
                            </h4>
                        </div>
                        <div class="pt-2">
                            <div class="float-right">
                                <a href="{{ route('admin.users.index') }}" class="text-white-50 stretched-link"><i
                                        class="fas fa-arrow-right h5"></i></a>
                            </div>

                            <p class="text-white-50 mb-0 mt-1">Till Today</p>
                        </div>
                    </div>
                </div>
            </div>
        @endcan

    </div>

</x-admin.layout>
