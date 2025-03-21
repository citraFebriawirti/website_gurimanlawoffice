<?php

use App\Http\Controllers\AboutusController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AgenController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Auth\logoutController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BusinessPartnerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\JobAssociateController;
use App\Http\Controllers\JobIntershipController;
use App\Http\Controllers\JoinUsController;
use App\Http\Controllers\LandingPage\HomePageController;
use App\Http\Controllers\LandingPage\LandingPageAboutUsController;
use App\Http\Controllers\LandingPage\LandingPageBlogController;
use App\Http\Controllers\LandingPage\LandingPageContactController;
use App\Http\Controllers\LandingPage\LandingPageJoinUsController;
use App\Http\Controllers\LandingPage\LandingPageProductController;
use App\Http\Controllers\LandingPage\LandingPageTeamWorkController;
use App\Http\Controllers\Landingpage\LayoutsController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LegalitasController;
use App\Http\Controllers\MisiOfficeController;
use App\Http\Controllers\NameOfficeController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SosialMediaController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VisiOfficeController;
use App\Models\Email;
use App\Models\Gallery;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomePageController::class, 'index'])->name('/');
Route::get('/aboutuslandingpage', [LandingPageAboutUsController::class, 'index'])->name('aboutuslandingpage');


Route::get('/teamlandingpage', [LandingPageTeamWorkController::class, 'index'])->name('teamlandingpage');
Route::get('/teamlandingpage/{id}', [LandingPageTeamWorkController::class, 'show'])->name('teamlandingpage.show');



Route::get('/productlandingpage', [LandingPageProductController::class, 'index'])->name('productlandingpage');
Route::get('/productlandingpage/{id}', [LandingPageProductController::class, 'show'])->name('productlandingpage.show');

Route::get('/bloglandingpage', [LandingPageBlogController::class, 'index'])->name('bloglandingpage');
Route::get('/bloglandingpage/{id}', [LandingPageBlogController::class, 'show'])->name('bloglandingpage.show');

Route::get('/contactlandingpage', [LandingPageContactController::class, 'index'])->name('contactlandingpage');

Route::get('/joinuslandingpage', [LandingPageJoinUsController::class, 'index'])->name('joinuslandingpage');


Route::get('/login', [loginController::class, 'index'])->name('login');
Route::post('/login_proses', [loginController::class, 'login'])->name('login_proses');
Route::get('/logout', [logoutController::class, 'logout'])->name('logout');



// Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
//     Route::resources([
//         'dashboard' => DashboardController::class,
//         'nameoffice' => NameOfficeController::class,
//         'address' => AddressController::class,
//         'phone' => PhoneController::class,
//         'email' => EmailController::class,
//         'sosialmedia' => SosialMediaController::class,
//         'visi' => VisiOfficeController::class,
//         'misi' => MisiOfficeController::class,
//         'product' => ProductController::class,
//         'team' => TeamController::class,
//         'businespartner' => BusinessPartnerController::class,
//         'users' => UsersController::class,
//         'hero' => HeroController::class,
//         'aboutus' => AboutusController::class,
//         'gallery' => GalleryController::class,
//         'jobassociate' => JobAssociateController::class,
//         'jobintership' => JobIntershipController::class,
//         'testimoni' => TestimoniController::class,
//         'artikel' => ArtikelController::class,
//         'legalitas' => LegalitasController::class,
//     ]);
// });

Route::resources([
    'dashboard' => DashboardController::class,
    'nameoffice' => NameOfficeController::class,
    'address' => AddressController::class,
    'phone' => PhoneController::class,
    'email' => EmailController::class,
    'sosialmedia' => SosialMediaController::class,
    'visi' => VisiOfficeController::class,
    'misi' => MisiOfficeController::class,
    'product' => ProductController::class,
    'team' => TeamController::class,
    'businespartner' => BusinessPartnerController::class,
    'users' => UsersController::class,
    'hero' => HeroController::class,
    'aboutus' => AboutusController::class,
    'gallery' => GalleryController::class,
    'jobassociate' => JobAssociateController::class,
    'jobintership' => JobIntershipController::class,
    'testimoni' => TestimoniController::class,
    'artikel' => ArtikelController::class,
    'legalitas' => LegalitasController::class,
    'joinus' => JoinUsController::class,
]);


// route fallback
// Route::fallback(function () {
//     return redirect()->route('login')->with('warning', 'Oops there is no page you are looking for');
// });