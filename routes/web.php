<?php

use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\DishRecipes;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\RecipeDetailsComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\User\UserDashboardComponent;
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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', HomeComponent::class);
Route::get('/dish-recipes', DishRecipes::class);
Route::get('/recipe/{slug}', RecipeDetailsComponent::class)->name('recipe.details');
Route::get('/recipe-category/{category_slug}', CategoryComponent::class)->name('recipe.category');
Route::get('/search', SearchComponent::class)->name('recipe.search');

/* Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard'); */

//For User
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
     Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
});

//For Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function(){
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/category/add', AdminCategoryComponent::class)->name('admin.addcategory');
});
