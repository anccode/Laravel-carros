<?php

use App\Http\Livewire\Admin\CategoryCrud;
use App\Http\Livewire\Admin\RoleManagement;
use App\Http\Livewire\Admin\UserManagement;
use App\Http\Livewire\Indexweb;
use App\Http\Livewire\Web\Productshow;
use App\Http\Livewire\Web\Userprofile;
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

// Route::get('/', function () {
//     return view('welcome');
// })->name('index');
Route::get('/',Indexweb::class)->name('index');
Route::get('/productos/{product}',Productshow::class)->name('product.show');

//Rutas para clientes
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/profile',Userprofile::class)->name('user.profile');
    //Route::get('/roles',RoleManagement::class)->name('roles');
    //Route::get('/users',UserManagement::class)->name('users');
});
