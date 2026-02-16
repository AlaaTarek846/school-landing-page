@extends('layout.website.master')

@php
    $locale = app()->getLocale();

    // Get bilingual SEO data
    $articleSeoTitle = $locale === 'ar'
        ? ($article->seo_title_ar ?: $article->seo_title ?: $article->title_ar)
        : ($article->seo_title_en ?: $article->seo_title ?: $article->title_en);

    $metaDescription = $locale === 'ar'
        ? ($article->meta_description_ar ?: $article->meta_description ?: \Illuminate\Support\Str::limit(strip_tags($article->content_ar), 155))
        : ($article->meta_description_en ?: $article->meta_description ?: \Illuminate\Support\Str::limit(strip_tags($article->content_en), 155));

    $focusKeyphrase = $locale === 'ar'
        ? ($article->focus_keyphrase_ar ?: $article->focus_keyphrase ?? '')
        : ($article->focus_keyphrase_en ?: $article->focus_keyphrase ?? '');

    $synonymsKeyphrase = $locale === 'ar'
        ? ($article->synonyms_keyphrase_ar ?: $article->synonyms_keyphrase ?? '')
        : ($article->synonyms_keyphrase_en ?: $article->synonyms_keyphrase ?? '');

    $tags = $locale === 'ar'
        ? ($article->getRawOriginal('tags_ar') ?: $article->getRawOriginal('tags') ?? [])
        : ($article->getRawOriginal('tags_en') ?: $article->getRawOriginal('tags') ?? []);

    // Ensure tags is an array
    if (!is_array($tags)) {
        $tags = json_decode($tags, true) ?: [];
    }
    $tagsString = is_array($tags) ? implode(', ', array_filter($tags)) : '';

    $permalink = $article->permalink ?? request()->url();
    $canonicalUrl = $locale === 'ar'
        ? ($article->canonical_url_ar ?: $permalink)
        : ($article->canonical_url_en ?: $permalink);

    $featuredImage = optional($article->media)->url ?? asset('website/images/favicons/apple-touch-icon.png');
    $categoryTitle = optional($article->category)->title ?? '';

    // Get alternate hreflang URLs
    $hreflangUrls = $article->alternate_hreflang ?? [];
@endphp

@section('title', $article->title)
@section('seo_title', $articleSeoTitle)
@section('seo_description', $metaDescription)
@section('seo_focus_keyphrase', $focusKeyphrase)
@section('seo_synonyms', $synonymsKeyphrase)
@section('seo_tags', $tagsString)
@section('seo_canonical', $canonicalUrl)
@section('seo_permalink', $permalink)
@section('seo_slug', $article->slug)
@section('seo_category', $categoryTitle)
@section('seo_image', $featuredImage)
@section('seo_og_type', 'article')

@push('hreflang_tags')
    @if(!empty($hreflangUrls))
        @foreach($hreflangUrls as $lang => $url)
            <link rel="alternate" hreflang="{{ $lang }}" href="{{ $url }}">
        @endforeach
        <link rel="alternate" hreflang="x-default" href="{{ $canonicalUrl }}">
    @endif
@endpush

@push('structured_data')
    @php
        $articleSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => $articleSeoTitle,
            'description' => $metaDescription,
            'image' => $featuredImage,
            'datePublished' => $article->created_at?->toIso8601String(),
            'dateModified' => $article->updated_at?->toIso8601String(),
            'author' => [
                '@type' => 'Organization',
                'name' => config('app.name', 'Epoxy')
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => config('app.name', 'Epoxy'),
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('website/images/favicons/apple-touch-icon.png')
                ]
            ],
            'inLanguage' => $locale,
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => $canonicalUrl
            ]
        ];

        if ($categoryTitle) {
            $articleSchema['articleSection'] = $categoryTitle;
        }

        if ($focusKeyphrase || $synonymsKeyphrase || $tagsString) {
            $keywords = array_filter([$focusKeyphrase, $synonymsKeyphrase, $tagsString]);
            $articleSchema['keywords'] = implode(', ', $keywords);
        }
    @endphp
    <script type="application/ld+json">
        {!! json_encode($articleSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>
@endpush

@section('content')
    <!-- Inner Banner -->
    <div class="inner-banner inner-bg2">
        <div class="container-fluid">
            <div class="container-max">
                <div class="inner-title">
                    <span>@lang("website.Articles")</span>
                    <h2>{{ $article->title }}</h2>
                    <p>
                        @if(app()->getLocale() == 'en')
                        {{ $article->created_at?->toFormattedDateString() }} /
                        @endif
                        <a href="{{route('home')}}">{{ __('website.home') }}</a>
                        @if(app()->getLocale() == 'ar')
                           \ {{ $article->created_at?->toFormattedDateString() }}
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Blog Details Area -->
    <div class="blog-details-area pt-100 pb-70">
        <div class="container">
            <div class="article-title">
                <div class="section-title-two">
                    <h2>
                        {{ $article->title }}
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="blog-article">
                        <div class="article-img">
                            <img src="{{ $article->media->url }}" alt="{{ $article->title }}">
                        </div>

                        <ul class="article-comment">
                            <li>
                                <div class="content">
                                    <h3>by Admin</h3>
                                    <span>
                                        @if(app()->getLocale() == 'en')
                                            {{ $article->created_at?->toFormattedDateString() }} /
                                        @endif
                                            <a href="{{route('home')}}">{{ __('website.home') }}</a>
                                        @if(app()->getLocale() == 'ar')
                                            \ {{ $article->created_at?->toFormattedDateString() }}
                                        @endif
                                    </span>
                                </div>
                            </li>

                            <li>

                            </li>

                            <li>
                                <div class="content-list">
                                    <h3>{{ $article->comments_count }}</h3>
                                    <span>{{ __('website.Comments') }}</span>
                                </div>
                            </li>
                        </ul>

                        <div class="article-content">
                            {!! $article->content  !!}
                        </div>

                        <div class="blog-article-share">
                            <div class="row align-items-center justify-content-center">
                            </div>
                        </div>

                        <div class="article-post">
                            <div class="row justify-content-center">
                                <div class="col-lg-6 col-sm-6">
                                    @if($previousProject)
                                    <div class="article-post-share">
                                        <span>
                                            @if(app()->getLocale() == 'en')
                                                {{ $previousProject->created_at?->toFormattedDateString() }} /
                                            @endif
                                            <a href="{{route('home')}}">{{ __('website.home') }}</a>
                                             @if(app()->getLocale() == 'ar')
                                                \ {{ $previousProject->created_at?->toFormattedDateString() }}
                                            @endif
                                        </span>
                                        <a href="{{ route('blog-details', ['slug' => $previousProject->route_slug ?? $previousProject->id]) }}">
                                            <h3>{{ $previousProject->title }}</h3>
                                        </a>
                                    </div>
                                    @endif
                                </div>

                                <div class="col-lg-6 col-sm-6">
                                    @if($nextProject)
                                    <div class="article-post-share text-align">
                                        <span>
                                            @if(app()->getLocale() == 'en')
                                                {{ $nextProject->created_at?->toFormattedDateString() }} /
                                            @endif
                                            <a href="{{route('home')}}">{{ __('website.home') }}</a>
                                             @if(app()->getLocale() == 'ar')
                                                \ {{ $nextProject->created_at?->toFormattedDateString() }}
                                            @endif
                                        </span>
                                        <a href="{{ route('blog-details', ['slug' => $nextProject->route_slug ?? $nextProject->id]) }}">
                                            <h3 class="active">{{ $nextProject->title }}</h3>
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="comments-wrap">
                            <h3 class="title">{{ __('website.Comments') }}({{ $article->comments_count }})</h3>
                            <ul>
                                @if(count($article->comments) > 0)
                                    @foreach($article->comments as $comment)
                                        <li>
                                            <h3>{{ $comment->name }}</h3>
                                            <span>{{ $comment->created_at?->toFormattedDateString() }}</span>
                                            <p>{{ $comment->comment }}</p>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>

                        <div class="comments-form">
                            <div class="contact-form">
                                <h2>@lang('website.Leave a Reply')</h2>
                                <form action="{{ route('blog-submit-query') }}" method="POST">
                                    @csrf
                                    <input type="hidden" required name="article_id" value="{{$article->id}}">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <i class='bx bx-user'></i>
                                                <input type="text" name="name" class="form-control" required data-error="Please enter first name*" placeholder="@lang('website.Name')*">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <i class='bx bx-mail-send'></i>
                                                <input type="email" name="email"  class="form-control" required data-error="Please enter your email" placeholder="@lang('website.Email')*">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <i class='bx bx-envelope'></i>
                                                <textarea name="comment" class="form-control" id="message" cols="30" rows="8" required data-error="Write your message" placeholder="@lang('website.Comment')"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <button type="submit" class="default-btn default-hot-toddy">
                                                @lang('website.Post Comment')
                                                @if(app()->getLocale() == 'en')
                                                    <i class='bx bx-right-arrow-alt'></i>
                                                @else
                                                    <i class='bx bx-left-arrow-alt'></i>
                                                @endif
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="blog-left-side">
                        <div class="blog-widget search-widget">
                            <form class="search-form" action="{{ route('blogs') }}" method="GET">
                                <input type="search" class="form-control" placeholder="@lang('website.Searching')">
                                @if (request()->has('category_id'))
                                    <input type="hidden" name="category_id" value="{{ request('category_id') }}">
                                @endif
                                <button type="submit">
                                    <i class="bx bx-search"></i>
                                </button>
                            </form>
                        </div>

                        <div class="blog-widget blog-widget-pos">
                            <h3 class="title">{{ __('website.Categories') }}</h3>
                            <div class="widget-post">
                                @foreach ($categories as $category)
                                <a href="{{ route('blogs') }}?category_id={{$category->id}}">
                                    <h3>{{ $category->title }}</h3>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Details Area End -->
    @include('components.home.newsletter')

@endsection
