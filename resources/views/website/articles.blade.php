@extends('layout.website.master')

@section('title', __('website.contact'))

@section('content')
    <!-- Inner Banner -->
    <div class="inner-banner inner-bg3">
        <div class="container-fluid">
            <div class="container-max">
                <div class="inner-title">
                    <span>@lang("website.Articles")</span>
                    <h2>@lang("website.Latest News in Here")</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Blog Wrap Area -->
    <div class="blog-wrap-area pt-100 pb-70">
        <div class="container">
            <div class="section-title-two text-center">
                <span class="section-span-bg">@lang("website.BLOG & NEWS")</span>
                <h2 class="margin-auto">@lang("website.News &") <b class="section-color">@lang("website.Updates")</b></h2>
            </div>
            <div class="row pt-45">
                @forelse ($articles as $article)
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <a href="{{route('blog-details',$article->route_slug ?? $article->id)}}">
                            <img src="{{ $article->media?->url }}" alt="{{ $article->title }}">
                        </a>
                        <div class="content">
                            <span>{{ $article->created_at?->toFormattedDateString() }} </span>
                            <a href="{{route('blog-details',$article->route_slug ?? $article->id)}}">
                                <h3>{{ $article->title }}</h3>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                    <h1>@lang('website.No Data Found here')</h1>
                @endforelse

                <div class="col-lg-12 col-md-12">
                    <div class="pagination-area text-center">
                        {!! $articles->appends(request()->query())->links() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Blog Wrap Area End -->

    @include('components.home.newsletter')

@endsection
