<div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
    <h1 class="page-title fw-semibold fs-18 mb-0">
        {{ $page }}
    </h1>
    <div class="ms-md-1 ms-0">
        <nav>
            <ol class="breadcrumb mb-0">
                 @if(!request()->routeIs('admin.dashboard'))
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('translation.main') }}</a></li>

                    <li class="breadcrumb-item active" aria-current="page">{{ $page }}</li>
                @endif
            </ol>
        </nav>
    </div>
</div>