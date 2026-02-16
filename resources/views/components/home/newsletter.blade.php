<!-- Newsletter Area -->
<div class="newsletter-area pt-100 pb-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="newsletter-content">
                    <i class='flaticon-email'></i>
                    <h2>{{ __('website.Join our weekly') }} <b class="section-color">{{ __('website.Newsletter') }}</b></h2>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="newsletter-form-area">
                    <form class="newsletter-form" data-toggle="validator" method="POST" action="{{ route('contact.subscribe') }}">
                        @csrf
                        <input type="email" class="form-control" placeholder="Enter Your Email" name="email" required autocomplete="off">
                        <button class="default-btn default-hot-toddy" type="submit">
                            {{ __('website.Subscribe') }}
                            @if(app()->getLocale() == 'en')
                                <i class='bx bx-right-arrow-alt'></i>
                            @else
                                <i class='bx bx-left-arrow-alt'></i>
                            @endif
                        </button>
                        <div id="validator-newsletter" class="form-result"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Newsletter Area End -->