@extends('layout.website.master')

@section('title',__('website.about'))

@section('content')

    <!-- Inner Banner -->
    <div class="inner-banner inner-bg7">
        <div class="container-fluid">
            <div class="container-max">
                <div class="inner-title">
                    <span>{{ __('website.Our newest areas') }}</span>
                    <h2>{{ $company->title }}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->


    <!-- Development Section -->
    <section class="development-section pt-100 pb-70">
        <div class="container">
            <div class="development-content">
                <div class="section-title-two text-center">
                    <h2>{{ __('website.Our newest areas') }}</b></h2>
                </div>
            </div>

            <div class="row pt-45">
                @foreach($projects as $project)
                <div class="col-lg-6 col-md-6">
                    <div class="development-item">
                        <img
                            src="{{ $project->media?->url }}"
                            onerror='src="{{asset('website/img/project-details/1.jpg')}}"'
                            alt="{{ $project->title }}"
                        >
                        <a href="{{ route('apartments',$project->slug) }}" class="content">
                            <h3>{{ $project->title }}</h3>
                            <p>
                                {{ $project->description }}
                            </p>
                            <span>{{ $project->year }}</span>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Development Section End -->


@endsection