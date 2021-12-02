<?php

use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddIngredientComponent;
use App\Http\Livewire\Admin\AdminAddRecipeComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditIngredientComponent;
use App\Http\Livewire\Admin\AdminEditRecipeComponent;
use App\Http\Livewire\Admin\AdminEditUserComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminIngredientComponent;
use App\Http\Livewire\Admin\AdminRecipeComponent;
use App\Http\Livewire\Admin\AdminUsersComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\DishRecipes;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\Moderator\ModeratorCommentComponent;
use App\Http\Livewire\Moderator\ModeratorDashboardComponent;
use App\Http\Livewire\RecipeDetailsComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\User\UserAddIngredientsComponent;
use App\Http\Livewire\User\UserAddRecipeComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\User\UserEditRecipeComponent;
use App\Http\Livewire\User\UserIngredientsComponent;
use App\Http\Livewire\User\UserRecipeComponent;
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
Route::get('/contact', ContactComponent::class);

/* Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard'); */

//For User 
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
     Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');

     Route::get('/user/recipes', UserRecipeComponent::class)->name('user.recipes');
     Route::get('/user/recipes/add', UserAddRecipeComponent::class)->name('user.addrecipe');
     Route::get('/user/recipe/edit/{recipe_slug}', UserEditRecipeComponent::class)->name('user.editrecipe');

     Route::get('/user/ingredients', UserIngredientsComponent::class)->name('user.ingredients');
     Route::get('/user/ingredients/add', UserAddIngredientsComponent::class)->name('user.addingredient');
});

//For Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function(){
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');

    Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/category/add', AdminAddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/category/edit/{category_slug}', AdminEditCategoryComponent::class)->name('admin.editcategory');

    Route::get('/admin/ingredients', AdminIngredientComponent::class)->name('admin.ingredients');
    Route::get('/admin/ingredient/add', AdminAddIngredientComponent::class)->name('admin.addingredient');
    Route::get('/admin/ingredient/edit/{ingredient_id}', AdminEditIngredientComponent::class)->name('admin.editingredient');

    Route::get('/admin/recipes', AdminRecipeComponent::class)->name('admin.recipes');
    Route::get('/admin/recipe/add', AdminAddRecipeComponent::class)->name('admin.addrecipe');
    Route::get('/admin/recipe/edit/{recipe_slug}', AdminEditRecipeComponent::class)->name('admin.editrecipe');

    Route::get('/admin/slider', AdminHomeSliderComponent::class)->name('admin.homeslider');
    Route::get('/admin/slider/add', AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
    Route::get('/admin/slider/edit/{slide_id}', AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');

    Route::get('/admin/users', AdminUsersComponent::class)->name('admin.users');
    Route::get('/admin/user/edit/{user_id}', AdminEditUserComponent::class)->name('admin.edituser');
});

//For Moderator 
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/moderator/dashboard', ModeratorDashboardComponent::class)->name('moderator.dashboard');

    Route::get('/moderator/comments', ModeratorCommentComponent::class)->name('moderator.comments');
});