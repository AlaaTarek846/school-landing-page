<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\Client\AboutController;




use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\TeamController;
use App\Http\Controllers\Admin\HomeSliderController;
use App\Http\Controllers\Admin\TeamController as AdminTeamController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OneAboutController;
use App\Http\Controllers\Admin\PolicyController;
use App\Http\Controllers\Admin\SettingController;


use App\Http\Controllers\Admin\WhyChooseUsController;
use App\Http\Controllers\Admin\EducationalStageController;
use App\Http\Controllers\Admin\ClassRoomController;
use App\Http\Controllers\Admin\CampusTourController;
use App\Http\Controllers\Admin\StudentRegistrationController;
use App\Http\Controllers\Admin\CampusTourCategoryController;
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
        
        Route::apiResource('settings', SettingController::class);

        Route::apiResource('testimonials', TestimonialController::class);
        Route::apiResource('contact-messages', ContactMessageController::class);
        Route::apiResource('policies', PolicyController::class);
        Route::apiResource('one-about', OneAboutController::class);

        // School Modules
        Route::apiResource('why-choose-us', WhyChooseUsController::class);
        Route::apiResource('educational-stages', EducationalStageController::class);
        Route::apiResource('class-rooms', ClassRoomController::class);
        Route::apiResource('campus-tours', CampusTourController::class);
        Route::apiResource('campus-tour-categories', CampusTourCategoryController::class);
        Route::apiResource('student-registrations', StudentRegistrationController::class)->only(['index', 'show']);

        Route::apiResource('facilities', \App\Http\Controllers\Admin\FacilityController::class);
        Route::get('facilities-dropdown', [\App\Http\Controllers\Admin\FacilityDetailController::class, 'getFacilities']);
        Route::apiResource('facility-details', \App\Http\Controllers\Admin\FacilityDetailController::class);

        Route::get('dashboard-stats', [DashboardController::class, 'getStats']);

    });

});

Route::prefix('admin')->name('admin.')->group(function () {

    Route::group(['middleware' => ['auth:web']], function () {

        // dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::name('page.')->prefix('page')->group(function () {

            Route::get('home-sliders', [HomeSliderController::class, 'indexPage'])->name('home-sliders');

            Route::get('setting', [SettingController::class, 'indexPage'])->name('setting');
            Route::get('one-about', [OneAboutController::class, 'indexPage'])->name('one-about');
            Route::get('team', [AdminTeamController::class, 'indexPage'])->name('team');
            Route::get('testimonial', [TestimonialController::class, 'indexPage'])->name('testimonial');
            Route::get('contact-messages', [ContactMessageController::class, 'indexPage'])->name('contact-messages');
            Route::get('policies', [PolicyController::class, 'indexPage'])->name('policies');
            
            // School Modules Pages
            Route::get('why-choose-us', [WhyChooseUsController::class, 'indexPage'])->name('why-choose-us');
            Route::get('educational-stages', [EducationalStageController::class, 'indexPage'])->name('educational-stages');
            Route::get('class-rooms', [ClassRoomController::class, 'indexPage'])->name('class-rooms');
            Route::get('campus-tours', [CampusTourController::class, 'indexPage'])->name('campus-tours');
            Route::get('campus-tour-categories', [CampusTourCategoryController::class, 'indexPage'])->name('campus-tour-categories');
            Route::get('student-registrations', [StudentRegistrationController::class, 'indexPage'])->name('student-registrations');
            Route::get('facilities', [\App\Http\Controllers\Admin\FacilityController::class, 'indexPage'])->name('facilities');
            Route::get('facility-details', [\App\Http\Controllers\Admin\FacilityDetailController::class, 'indexPage'])->name('facility-details');
        });

        // logout
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    });

});


//client routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sitemap.xml', function () {
    $sitemapService = new \App\Services\SitemapService();
    return response($sitemapService->generateSitemap(), 200)
        ->header('Content-Type', 'application/xml');
})->name('sitemap');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/about', [AboutController::class, 'index'])->name('about');


Route::get('/team', [TeamController::class, 'index'])->name('team');


Route::get('/policy', [App\Http\Controllers\Client\SettingController::class, 'policy'])->name('policy');
Route::get('/terms', [App\Http\Controllers\Client\SettingController::class, 'termCondition'])->name('termCondition');

// School Client Routes
Route::post('/student-registration', [App\Http\Controllers\Client\StudentRegistrationController::class, 'store'])->name('student-registration.store');
Route::get('/get-school-stages', [App\Http\Controllers\Client\StudentRegistrationController::class, 'getStages'])->name('school-stages.get');

Route::get('{any}', [HomeController::class, 'index'])->where('any', '^(?!api\/).*$');

