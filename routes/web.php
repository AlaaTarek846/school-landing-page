<?php

use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\ArticleCategoryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\CounterAboutController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\FaqSectionController;
use App\Http\Controllers\Admin\HomeSliderController;
use App\Http\Controllers\Admin\OneAboutController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\PolicyController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\PropertyTypeController;
use App\Http\Controllers\Admin\ResaleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServiceFaqController;
use App\Http\Controllers\Admin\ProjectChallengeSolutionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\SubscribeController;
use App\Http\Controllers\Admin\TeamController as AdminTeamController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TwoAboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Client\AboutController;
use App\Http\Controllers\Client\AppointmentController;
use App\Http\Controllers\Client\ArticleController as ClientArticleController;
use App\Http\Controllers\Client\DonateController;
use App\Http\Controllers\Client\FaqController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Client\GalleryController as ClientGalleryController;
use App\Http\Controllers\Client\ProjectController as ProjectClientController;
use App\Http\Controllers\Client\ServiceController as ServiceClientController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\TeamController;
use App\Http\Resources\Admin\TwoAboutResource;
use App\Http\Controllers\Admin\WhyChooseUsController;
use App\Http\Controllers\Admin\EducationalStageController;
use App\Http\Controllers\Admin\ClassRoomController;
use App\Http\Controllers\Admin\CampusTourController;
use App\Http\Controllers\Admin\StudentRegistrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;

Route::get('change-language/{locale}', [LanguageController::class, 'changeLanguage'])->name('change.language');

//auth routes
Route::group([], function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
});

//admin routes

Route::prefix('api')->group(function () {

    // login
    Route::post('login', [AuthController::class, 'login']);

    Route::group(['middleware' => ['auth']], function () {

        Route::apiResource('home-sliders', HomeSliderController::class);
        Route::apiResource('teams', AdminTeamController::class);
        Route::apiResource('partners', PartnerController::class);
        Route::apiResource('faq-sections', FaqSectionController::class);
        Route::apiResource('faqs', AdminFaqController::class);
        Route::apiResource('counters', CounterController::class);
        Route::apiResource('counter-abouts', CounterAboutController::class);
        Route::apiResource('one-abouts', OneAboutController::class);
        Route::apiResource('two-abouts', TwoAboutController::class);
        Route::get('services-dropdown', [ServiceController::class, 'dropdown']);
        Route::apiResource('services', ServiceController::class);
        Route::get('projects-dropdown', [ProjectController::class, 'dropdown']);
        Route::apiResource('projects', ProjectController::class);
        Route::apiResource('settings', SettingController::class);
        Route::apiResource('articleCategory', ArticleCategoryController::class);
        Route::get('articlesQueries', [ArticleController::class, 'articlesQueries']);
        Route::get('articles/categories', [ArticleController::class, 'getCategories']);
        Route::post('articles/analyze-seo', [ArticleController::class, 'analyzeSeo']);
        Route::post('articles/pre-publish-checklist', [ArticleController::class, 'prePublishChecklist']);
        Route::apiResource('articles', ArticleController::class);
        Route::apiResource('service-faqs', ServiceFaqController::class);
        Route::apiResource('testimonials', TestimonialController::class);
        Route::apiResource('contact-messages', ContactMessageController::class);
        Route::apiResource('subscribes', SubscribeController::class);
        Route::get('project-categories-dropdown', [ProjectCategoryController::class, 'dropdown']);
        Route::apiResource('project-categories', ProjectCategoryController::class);
        Route::apiResource('project-challenge-solutions', ProjectChallengeSolutionController::class);
        Route::apiResource('gallery', AdminGalleryController::class);
        Route::apiResource('policies', PolicyController::class);
        Route::apiResource('property-types', PropertyTypeController::class);
        Route::get('companies-dropdown', [CompanyController::class, 'getCompanies']);
        Route::apiResource('companies', CompanyController::class);
        Route::get('areas-dropdown', [AreaController::class, 'getAreas']);
        Route::apiResource('areas', AreaController::class);
        Route::apiResource('properties', PropertyController::class);
        Route::delete('properties/media/{id}',[PropertyController::class,'deleteMedia']);
        Route::apiResource('resales', ResaleController::class);

        // School Modules
        Route::apiResource('why-choose-us', WhyChooseUsController::class);
        Route::apiResource('educational-stages', EducationalStageController::class);
        Route::apiResource('class-rooms', ClassRoomController::class);
        Route::apiResource('campus-tours', CampusTourController::class);
        Route::apiResource('student-registrations', StudentRegistrationController::class)->only(['index', 'show']);

    });

});

Route::prefix('admin')->name('admin.')->group(function () {

    Route::group(['middleware' => ['auth:web']], function () {

        // dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::name('page.')->prefix('page')->group(function () {

            Route::get('home-sliders', [HomeSliderController::class, 'indexPage'])->name('home-sliders');
            Route::get('partners', [PartnerController::class, 'indexPage'])->name('partners');
            Route::get('faq-section', [FaqSectionController::class, 'indexPage'])->name('faq-section');
            Route::get('faqs', [AdminFaqController::class, 'indexPage'])->name('faq');
            Route::get('counters', [CounterController::class, 'indexPage'])->name('counter');
            Route::get('services', [ServiceController::class, 'indexPage'])->name('services');
            Route::get('setting', [SettingController::class, 'indexPage'])->name('setting');
            Route::get('projects', [ProjectController::class, 'indexPage'])->name('projects');
            Route::get('one-about', [OneAboutController::class, 'indexPage'])->name('one-about');
            Route::get('two-about', [TwoAboutController::class, 'indexPage'])->name('two-about');
            Route::get('counter-about', [CounterAboutController::class, 'indexPage'])->name('counter-about');
            Route::get('article-categories', [ArticleCategoryController::class, 'indexPage'])->name('article-categories');
            Route::get('articles-queries', [ArticleController::class, 'indexPageQueries'])->name('articles-queries');
            Route::get('articles', [ArticleController::class, 'indexPage'])->name('articles');
            Route::get('service-faqs', [ServiceFaqController::class, 'indexPage'])->name('service-faqs');
            Route::get('team', [AdminTeamController::class, 'indexPage'])->name('team');
            Route::get('testimonial', [TestimonialController::class, 'indexPage'])->name('testimonial');
            Route::get('project-categories', [ProjectCategoryController::class, 'indexPage'])->name('project-categories');
            Route::get('project-challenge-solutions', [ProjectChallengeSolutionController::class, 'indexPage'])->name('project-challenge-solutions');
            Route::get('contact-messages', [ContactMessageController::class, 'indexPage'])->name('contact-messages');
            Route::get('subscribes', [SubscribeController::class, 'indexPage'])->name('subscribes');
            Route::get('gallery', [AdminGalleryController::class, 'indexPage'])->name('gallery');
            Route::get('policies', [PolicyController::class, 'indexPage'])->name('policies');
            Route::get('property-types', [PropertyTypeController::class, 'indexPage'])->name('property-types');
            Route::get('companies', [CompanyController::class, 'indexPage'])->name('companies');
            Route::get('areas', [AreaController::class, 'indexPage'])->name('areas');
            Route::get('properties', [PropertyController::class, 'indexPage'])->name('properties');
            Route::get('resales', [ResaleController::class, 'indexPage'])->name('resales');
            
            // School Modules Pages
            Route::get('why-choose-us', [WhyChooseUsController::class, 'indexPage'])->name('why-choose-us');
            Route::get('educational-stages', [EducationalStageController::class, 'indexPage'])->name('educational-stages');
            Route::get('class-rooms', [ClassRoomController::class, 'indexPage'])->name('class-rooms');
            Route::get('campus-tours', [CampusTourController::class, 'indexPage'])->name('campus-tours');
            Route::get('student-registrations', [StudentRegistrationController::class, 'indexPage'])->name('student-registrations');
        });

        // logout
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    });

});


//client routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/articles', [ClientArticleController::class, 'index'])->name('blogs');
Route::post('/articles/submit-query', [ClientArticleController::class, 'submitQuery'])->name('blog-submit-query');
Route::get('/articles/blog-details/{slug}', [ClientArticleController::class, 'blogDetails'])->name('blog-details');
Route::get('/sitemap.xml', function () {
    $sitemapService = new \App\Services\SitemapService();
    return response($sitemapService->generateSitemap(), 200)
        ->header('Content-Type', 'application/xml');
})->name('sitemap');
Route::get('/portfolio', [ClientArticleController::class, 'portfolioIndex'])->name('portfolio');
Route::get('/portfolio/portfolio-details/{slug}', [ClientArticleController::class, 'portfolioDetails'])->name('portfolio-details');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/projects', [ProjectClientController::class, 'index'])->name('project');
Route::get('/project/{slug}', [ProjectClientController::class, 'show'])->name('project-details');
Route::get('/service', [ServiceClientController::class, 'index'])->name('service');
Route::get('/service/{slug}', [ServiceClientController::class, 'show'])->name('service-details');
Route::get('/team', [TeamController::class, 'index'])->name('team');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/gallery', [ClientGalleryController::class, 'index'])->name('gallery');
Route::get('/donate', [DonateController::class, 'index'])->name('donate');
Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment');
Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');
Route::post('/contact-message', [ContactController::class, 'store'])->name('contact.store');
Route::post('/subscribe', [ContactController::class, 'subscribe'])->name('contact.subscribe');

Route::get('/volunteer', [App\Http\Controllers\Client\VolunteerController::class, 'index'])->name('volunteer');
Route::get('/event', [App\Http\Controllers\Client\EventController::class, 'index'])->name('event');
Route::get('/event-details', [App\Http\Controllers\Client\EventController::class, 'details'])->name('event-details');





Route::get('/apartments/{slug?}', [App\Http\Controllers\Client\ApartmentController::class, 'index'])->name('apartments');
Route::get('/apartments-resail', [App\Http\Controllers\Client\ApartmentController::class, 'resail'])->name('apartments-resail');
Route::get('/apartment-details/{slug?}', [App\Http\Controllers\Client\ApartmentController::class, 'show'])->name('apartment-details');
Route::get('/developments', [App\Http\Controllers\Client\ApartmentController::class, 'areas'])->name('areas');
Route::get('/developments/{slug}', [App\Http\Controllers\Client\ApartmentController::class, 'developments'])->name('developments');
Route::get('/policy', [App\Http\Controllers\Client\SettingController::class, 'policy'])->name('policy');
Route::get('/terms', [App\Http\Controllers\Client\SettingController::class, 'termCondition'])->name('termCondition');

// School Client Routes
Route::post('/student-registration', [App\Http\Controllers\Client\StudentRegistrationController::class, 'store'])->name('student-registration.store');
Route::get('/get-school-stages', [App\Http\Controllers\Client\StudentRegistrationController::class, 'getStages'])->name('school-stages.get');

Route::get('{any}', [HomeController::class, 'index'])->where('any', '^(?!api\/).*$');

