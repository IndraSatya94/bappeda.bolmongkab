<?php
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DetailPageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

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

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false
]);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/events', [HomeController::class, 'event'])->name('events');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/news', [HomeController::class, 'news'])->name('news');
Route::get('/news/{slug}', [DetailPageController::class, 'news'])->name('detail-news');
Route::get('/page/{slug}', [DetailPageController::class, 'index'])->name('detail-page');
Route::get('/category/{category:slug}', [DetailPageController::class, 'category'])->name('category');
Route::get('/tag/{tag:slug}', [DetailPageController::class, 'tag'])->name('tag');
Route::get('/event/{event:slug}', [DetailPageController::class, 'event'])->name('event');
Route::get('/information/{information:slug}', [DetailPageController::class, 'information'])->name('information');

Route::prefix('search')->group(function () {
    Route::post('/result', [SearchController::class, 'news'])->name('search');
});

Route::prefix('guest')->group(function () {
    Route::post('/contact/store', [StoreController::class, 'contact'])->name('contact-store');
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('profile', ProfileController::class);
    Route::resource('slide', SlideController::class);
    Route::resource('menu', MenuController::class);
    Route::resource('page', PageController::class);
    Route::resource('event', EventController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('tag', TagController::class);
    Route::resource('news', NewsController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('user', UserController::class);
    Route::resource('roles', RoleController::class);
});
