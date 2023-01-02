<?php

use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageMultiUploadController;
use App\Http\Controllers\TopSecMenController;
use App\Http\Controllers\ImageSingleUploadController;
use App\Models\Image;
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

Route::get('/welcome', function () {
  return view('welcome');
});
Route::get('/', function () {
  $dtCarousleImages = Image::where('type', '1')->pluck('name')->all();
  $mbCarousleImages = Image::where('type', '2')->pluck('name')->all();
  // dd($dtCarousleImages, $mbCarousleImages);
  return view('user/dash', ['dtCarousleImages' => $dtCarousleImages, 'mbCarousleImages' => $mbCarousleImages]);
})->name('/');

// Route::get('/', [HomeController::class, 'userHome'])->name('/');
Route::get('/features', [TopSecMenController::class, 'featureHome'])->name('features');

Auth::routes();
Route::get('/redirectAuthenticatedUsers', [RedirectAuthenticatedUsersController::class, 'index'])->middleware('auth')->name('redirectAuthenticatedUsers');
//admin
Route::prefix('admin')->middleware(['auth', 'verified', 'role:admin'])->group(function () {
  Route::get('home', [HomeController::class, 'adminHome'])->name('home');
  Route::get('upload-img', [ImageSingleUploadController::class, 'index'])->name('upload-img');
  Route::post('upload-image', [ImageSingleUploadController::class, 'store'])->name('upload-image');
  Route::delete('delete-img/{id}/{name}', [ImageSingleUploadController::class, 'deleteImg'])->name('delete-img');
  Route::get('edit-img/{id}', [ImageSingleUploadController::class, 'editImg'])->name('edit-img');
  Route::put('update-img/{id}', [ImageSingleUploadController::class, 'updateImg'])->name('update-img');

  Route::get('uploadmulti', [ImageMultiUploadController::class, 'index'])->name('uploadmulti');
  Route::post('uploadmultiaction', [ImageMultiUploadController::class, 'store'])->name('uploadmultiaction');

  Route::get('category', [CategoriesController::class, 'index'])->name('category');
  Route::post('categoryaction', [CategoriesController::class, 'store'])->name('categoryaction');
  Route::put('update-category/{id}', [CategoriesController::class, 'update'])->name('update-category');
  Route::delete('delete-category/{id}', [CategoriesController::class, 'destroy'])->name('delete-category');
});
//set_array error occurs
// Route::get('/uploads/{file}', [function ($file) {
//   $path = storage_path('app/uploads/' . $file);
//   // dd($file, $path, file_exists($path));
//   if (file_exists($path)) {
//     //return response()->file($path, array('Content-Type' => 'image/jpg'));
//   }
//   abort(404);
// }]);
Route::get('uploads/{filename}', [ImageSingleUploadController::class, 'displayImage'])->name('uploads.displayImage');
