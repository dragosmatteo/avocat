<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix(LaravelLocalization::setLocale())->middleware('cacheControl','https','restrict.public','localeSessionRedirect', 'localizationRedirect', 'localeViewPath')->group(function () {

  Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

  Route::get('/asigurari', [App\Http\Controllers\ServiceController::class, 'index'])->name('service.index');

  Route::get('/asigurari/{service}', [App\Http\Controllers\ServiceController::class, 'show'])->name('service.show');

  Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');

  Route::get('/blog/{blog}', [App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');

  Route::get('/despre-esigur', [App\Http\Controllers\AboutController::class, 'index'])->name('about.index');

  Route::get('/contacte', function () {
      return view('contact.index');
  })->name('contact.index');

  Route::get('/intrebari-frecvente', function () {
    $faqs = App\Models\Faq::all();

    return view('faq.index', compact('faqs'));
  })->name('faq.index');

  Route::post('/feedback/store', [App\Http\Controllers\FeedbackController::class, 'call'])->name('feedback.store');
  Route::get('/feedback/success', [App\Http\Controllers\FeedbackController::class, 'show'])->name('feedback.success');

});

Route::prefix('c-panel')->group(function () {

    Auth::routes();

    Route::get('/register', function () {
      return redirect()->route('login');
    });

    Route::middleware('auth')->group(function () {

      Route::get('/', function () {
        $constants = config('constant.constant');
        return view('cpanel.home.index',compact('constants'));
      })->name('cp-home');

      Route::resources([
        'sliders' => App\Http\Controllers\cpanel\SliderController::class,
        'testimonials' => App\Http\Controllers\cpanel\TestimonialController::class,
        'blogs' => App\Http\Controllers\cpanel\BlogController::class,
        'partners' => App\Http\Controllers\cpanel\PartnerController::class,
        'works' => App\Http\Controllers\cpanel\WorkController::class,
        'types' => App\Http\Controllers\cpanel\TypeController::class,
        'faqs' => App\Http\Controllers\cpanel\FaqController::class,
        'steps' => App\Http\Controllers\cpanel\StepController::class,
        'advantages' => App\Http\Controllers\cpanel\AdvantageController::class,
        'prices' => App\Http\Controllers\cpanel\PriceController::class,
        'parts' => App\Http\Controllers\cpanel\PartController::class,
        'services' => App\Http\Controllers\cpanel\ServiceController::class,
        'features' => App\Http\Controllers\cpanel\FeatureController::class,
        'teams' => App\Http\Controllers\cpanel\TeamController::class,
        'abouts' => App\Http\Controllers\cpanel\AboutController::class,
      ]);

      Route::get('/clear/cache', function () {
        Cache::flush();
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return back();
      })->name('cache.clear');

      // static routes
      Route::post('/static/update/{file}',[App\Http\Controllers\cpanel\StaticController::class, 'update'])->name('static.update');

      Route::get('/works/delete/{work}/{key}/{image}', [App\Http\Controllers\cpanel\WorkController::class, 'deleteImage'])->name('works-delete-image');
      Route::get('/abouts/delete/{about}/{key}/{image}', [App\Http\Controllers\cpanel\AboutController::class, 'deleteImage'])->name('abouts-delete-image');

    });



});
