<?php

use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddRecipeComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditRecipeComponent;
use App\Http\Livewire\Admin\AdminEditUserComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminRecipeComponent;
use App\Http\Livewire\Admin\AdminUsersComponent;
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
    Route::get('/admin/category/add', AdminAddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/category/edit/{category_slug}', AdminEditCategoryComponent::class)->name('admin.editcategory');

    Route::get('/admin/recipes', AdminRecipeComponent::class)->name('admin.recipes');
    Route::get('/admin/recipe/add', AdminAddRecipeComponent::class)->name('admin.addrecipe');
    Route::get('/admin/recipe/edit/{recipe_slug}', AdminEditRecipeComponent::class)->name('admin.editrecipe');

    Route::get('/admin/slider', AdminHomeSliderComponent::class)->name('admin.homeslider');
    Route::get('/admin/slider/add', AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
    Route::get('/admin/slider/edit/{slide_id}', AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');

    Route::get('/admin/users', AdminUsersComponent::class)->name('admin.users');
    Route::get('/admin/user/edit/{user_id}', AdminEditUserComponent::class)->name('admin.edituser');
});
