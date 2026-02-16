<div class="header-element country-selector">
    <!-- Start::header-link|dropdown-toggle -->
    <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-auto-close="outside" data-bs-toggle="dropdown">
        @if(app()->getLocale() == 'en')
            <img src="{{asset('../assets/images/flags/us_flag.jpg')}}" alt="img" class="rounded-circle header-link-icon">
        @else
            <img src="{{asset('../assets/images/flags/sau_Flag.jpg')}}" alt="img" class="rounded-circle header-link-icon">
        @endif
    </a>
    <!-- End::header-link|dropdown-toggle -->
    <ul class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
        <li>
            @if(app()->getLocale() != 'en')
            <a class="dropdown-item d-flex align-items-center" href="{{ route('change.language', 'en') }}">
                <span class="avatar avatar-xs lh-1 me-2">
                    <img src="{{asset('../assets/images/flags/us_flag.jpg')}}" alt="img">
                </span>
                English
            </a>
            @else
            <a class="dropdown-item d-flex align-items-center" href="{{ route('change.language', 'ar') }}">
                <span class="avatar avatar-xs lh-1 me-2">
                    <img src="{{asset('../assets/images/flags/sau_Flag.jpg')}}" alt="img">
                </span>
                Arabic
            </a>
            @endif
        </li>
    </ul>
</div>

