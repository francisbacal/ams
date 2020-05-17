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
| USERS
|----------------------*/




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

/*-----------------------
| ASSETS
|----------------------*/

Route::resource('assets', 'AssetController');

// Route::get('/assets-trashed', ['as' => 'assets.trashed', 'uses' => 'AssetController@softDeleted']);

Route::get('/assets-trashed', 'AssetController@softDeleted')
    ->name('assets.trashed')->middleware("role:admin");

Route::put('/assets-trashed/{asset}/restore', 'AssetController@restore')
    ->name('assets.restore')->middleware("role:admin");

Route::post('/assets-trashed/restoreall', 'AssetController@restoreAll')
    ->name('assets.restoreall')->middleware("role:admin");

/*-----------------------
| REQUESTS
|----------------------*/

Route::resource('requisitions', 'RequisitionController');

/*-----------------------
| PERMISSIONS
|----------------------*/

Route::resource('permissions', 'PermissionController')->middleware('role:admin');
