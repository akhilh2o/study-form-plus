<div class="list-group mb-4">
    <li class="list-group-item ">
        <div class="d-flex align-items-center justify-content-center">
            <img src="{{ auth()->user()->profileImg() }}" alt="{{ auth()->user()->name }}">
        </div>
    </li>
    <li class="list-group-item">
        <h6 class="my-1">
            >> Full Name
        </h6>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{ auth()->user()->name }}</span>
    </li>
    <li class="list-group-item">
        <h6 class="my-1">
            >> Email:
        </h6>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{ auth()->user()->email }}</span>
    </li>
    <li class="list-group-item">
        <h6 class="my-1" id="">
            >> Mobile
        </h6>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{ auth()->user()->mobile }}</span>
    </li>
    <li class="list-group-item">
        <div class="d-flex align-items-center gap-3">
            <div class="col">
                <a href="{{ route('user.dashboard') }}" class="btn btn-primary px-4">Dashboard</a>
            </div>
            <div class="col">
                <a href="{{ route('user.profile') }}" class="btn btn-secondary px-4">Profile</a>
            </div>
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