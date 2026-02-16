<div class="header-element">
    <!-- Start::header-link|dropdown-toggle -->
    <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
        <div class="d-flex align-items-center">
            <div class="me-sm-2 me-0">
                <img src="{{asset('assets/images/faces/9.jpg')}}" alt="img" width="32" height="32" class="rounded-circle">
            </div>
            <div class="d-sm-block d-none">
                {{--Auth::user()->name--}}
                <p class="fw-semibold mb-0 lh-1">{{ auth()->user()->name }}</p>
            </div>
        </div>
    </a>
    <!-- End::header-link|dropdown-toggle -->
    <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end" aria-labelledby="mainHeaderProfile">
{{--        <li><a class="dropdown-item d-flex" href="profile.html"><i class="ti ti-user-circle fs-18 me-2 op-7"></i>Profile</a></li>--}}
        <li>
            <form method="POST" id="logout" action="{{ route('admin.logout') }}">
                @csrf
                <a class="dropdown-item d-flex" href="javascript::void(0)" onclick="$('#logout').submit()">
                    <i class="ti ti-logout fs-18 me-2 op-7"></i>
                    Log Out
                </a>
            </form>
        </li>
    </ul>
</div>