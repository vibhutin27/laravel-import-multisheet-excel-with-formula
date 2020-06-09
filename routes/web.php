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

/*getUsers/{id} – This is used in jQuery AJAX.*/


Auth::routes();
/*yajara tables example */
Route::get('/', 'BookListController@index')->name('users.index');
Route::post('import-book-data','BookListController@importBookData')->name('importBookData');



// working show data and search data from the database
Route::get('/', 'EmployeesController@index'); 
Route::get('/getUsers/{id}','EmployeesController@getUsers'); 

Route::get('/index',function(){
    return view('index');
});

Route::resource('blogs','BlogController');
