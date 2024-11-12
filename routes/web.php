<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;


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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/menu', [\App\Http\Controllers\MenuController::class, 'index'])->name('menu');
Route::get('/menu/filter', [\App\Http\Controllers\MenuController::class, 'filter'])->name('menu.filter');
Route::get('/menu/{id}', [\App\Http\Controllers\MenuController::class, 'show'])->name('menu.single');
Route::get('/reservation', [\App\Http\Controllers\ReservationController::class, 'index'])->name('reservation');
Route::post('/reservation/bookTable', [\App\Http\Controllers\ReservationController::class, 'bookTable'])->name('reservation.bookTable');
Route::post('/reservation/destroy/{id}', [\App\Http\Controllers\ReservationController::class, 'destroy'])->name('reservation.destroy');
Route::get('/gallery', [\App\Http\Controllers\GalleryController::class, 'index'])->name('gallery');
Route::get('/author', [\App\Http\Controllers\AuthorController::class, 'index'])->name('author');
Route::get('/gallery/{id}', [\App\Http\Controllers\GalleryController::class, 'show'])->name('gallery.single');
Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'submitContact'])->name('contact.submit');
Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login.login');

Route::middleware(['auth'])->group(function() {
    Route::get("/profile", [\App\Http\Controllers\ProfileController::class, 'index'])->name("profile");
    Route::get("/profile/{email}", [\App\Http\Controllers\ProfileController::class, 'getReservations'])->name("profile.reservations");
    Route::get("/profile/info/{id}", [\App\Http\Controllers\ProfileController::class, 'getInfo'])->name("profile.reservations");
    Route::post("/profile/{id}", [\App\Http\Controllers\ProfileController::class, 'photoUpdate'])->name("profile.photo");
    Route::post("/profile/info/{id}", [\App\Http\Controllers\ProfileController::class, 'infoUpdate'])->name("profile.info");
    Route::post("/testimonial/{id}", [\App\Http\Controllers\TestimonialController::class, 'store'])->name("testimonial.store");
    Route::post('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('login.logout');

});

Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'index'])->name('register');
Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'register'])->name('register.register');

Route::middleware(['isAdmin'])->group(function() {
    Route::resource("/admin", \App\Http\Controllers\AdminController::class);
    Route::get('/admin/filter/{dateFrom}/{dateTo}', [\App\Http\Controllers\AdminController::class, 'filter'])->name('admin.filter');
    Route::resource("/adminContact", \App\Http\Controllers\AdminContactController::class);
    Route::resource("/adminEmployeeRole", \App\Http\Controllers\AdminEmployeeRoleController::class);
    Route::resource("/adminEmployee", \App\Http\Controllers\AdminEmployeeController::class);
    Route::resource("/adminGallery", \App\Http\Controllers\AdminGalleryController::class);
    Route::resource("/adminGalleryImage", \App\Http\Controllers\AdminGalleryImageController::class);
    Route::resource("/adminLocation", \App\Http\Controllers\AdminLocationController::class);
    Route::resource("/adminMealTime", \App\Http\Controllers\AdminMealTimeController::class);
    Route::resource("/adminMenuCategory", \App\Http\Controllers\AdminMenuCategoryController::class);
    Route::resource("/adminMenuItem", \App\Http\Controllers\AdminMenuItemController::class);
    Route::resource("/adminNavigation", \App\Http\Controllers\AdminNavigationController::class);
    Route::resource("/adminPrice", \App\Http\Controllers\AdminPriceController::class);
    Route::resource("/adminReservation", \App\Http\Controllers\AdminReservationController::class);
    Route::resource("/adminRestaurantInformation", \App\Http\Controllers\AdminRestaurantInformationController::class);
    Route::resource("/adminRole", \App\Http\Controllers\AdminRoleController::class);
    Route::resource("/adminSubscriber", \App\Http\Controllers\AdminSubscriberController::class);
    Route::resource("/adminTable", \App\Http\Controllers\AdminTableController::class);
    Route::resource("/adminTestimonial", \App\Http\Controllers\AdminTestimonialController::class);
    Route::resource("/adminUser", \App\Http\Controllers\AdminUserController::class);
    Route::resource("/adminUserImage", \App\Http\Controllers\AdminUserImageController::class);
    Route::resource("/adminWorkingHour", \App\Http\Controllers\AdminWorkingHourController::class);

});
