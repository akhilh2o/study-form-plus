<div class="list-group mb-4">
    <li class="list-group-item ">
        <div class="d-flex align-items-center  gap-2">
            <img src="{{ auth()->user()->profileImg() }}" alt="{{ auth()->user()->name }}" style="width: 50px; ">
        <div class="user ">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{ auth()->user()->name }}</span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{ auth()->user()->email }}</span><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{ auth()->user()->mobile }}</span>
            
        </div>
        </div>
    </li>
    <li class="list-group-item">
    <a class="dropdown-item fw-bold fs-6" href="{{ route('user.dashboard') }}">
                                              Dashboard

                                                
                                            </a>
    </li>
    <li class="list-group-item">
    <a class="dropdown-item fw-bold fs-6" href="{{ route('user.profile') }}">
    Profile
                                            </a>
    </li>
    <li class="list-group-item">
    <a class="dropdown-item fw-bold fs-6" href="{{ route('wishlists.index') }}">
    Wishlist
                                            </a>
    </li>
    <li class="list-group-item">
    <a class="dropdown-item fw-bold fs-6" href="{{ route('user.orders') }}">
    Orders
                                            </a>
    </li>
    <li class="list-group-item">
    <a class="dropdown-item fw-bold fs-6" href="{{ route('user.password') }}">
    Change Password
                                            </a>
    </li>
    <li class="list-group-item">
        <div class="d-flex align-items-center gap-3">
            <!-- <div class="col">
                <a href="{{ route('user.dashboard') }}" class="btn btn-primary px-4">Dashboard</a>
            </div>
            <div class="col">
                <a href="{{ route('user.profile') }}" class="btn btn-secondary px-4">Profile</a>
            </div> -->
            <div class="col">
                <a href="javascript:void(0)" class="btn btn-danger px-4" 
                onclick="event.preventDefault();document.getElementById('user-logout-form').submit();">Logout</a>
                <form id="user-logout-form" action="{{ route('logout') }}" method="POST"
                    style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </li>
</div>