<?php

use App\Http\Controllers\TestimonialController;
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

Route::get('/', [TestimonialController::class,'index']);
Route::post('/store', [TestimonialController::class,'store'])->name("testimonials.store");

Route::get('/admin', [TestimonialController::class,'adminIndex'])->name("admin.index");
Route::post('testimonial/{testimonial}/approve', [TestimonialController::class,'approve'])->name("testimonial.approve");
Route::post('testimonial/{testimonial}/reject', [TestimonialController::class,'reject'])->name("testimonial.reject");
Route::get('testimonial/{testimonial}/edit', [TestimonialController::class,'edit'])->name("testimonial.edit");
Route::put('testimonial/{testimonial}', [TestimonialController::class,'update'])->name("testimonial.update");
Route::delete('testimonial/{testimonial}/delete', [TestimonialController::class,'delete'])->name("testimonial.delete");