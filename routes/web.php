<?php

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

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*-----------------------
| CATEGORIES
|----------------------*/

Route::get('/categories/trashed', 'CategoryController@softDeleted')
    ->name('categories.trashed')->middleware("role:admin");
Route::put('/categories/{category}/restore', 'CategoryController@restore')
    ->name('categories.restore')->middleware("role:admin");
Route::post('/categories/trashed/restoreall', 'CategoryController@restoreAll')
    ->name('categories.restoreall')->middleware("role:admin");
Route::post('add-category', ['as' => 'add.category', 'uses' => 'CategoryController@addCategory'])->middleware("role:admin");

Route::get('category-tree-view', ['uses' => 'CategoryController@manageCategory']);
Route::resource('categories', 'CategoryController')->only('update', 'index', 'destroy');

Route::resource('permissions', 'PermissionController');
