<?php declare(strict_types=1);

use App\Http\Controllers\HomeController;
use App\Person;
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
    return view('welcome');
});

Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController')->name('home');
    Route::get('/home/json', 'HomeController@json')->name('home-json');
    Route::get('/edit/{person}', 'EditPersonController@index')->name('edit-person');
    Route::post('/edit/{person}', 'EditPersonController@handle')->name('edit-person-handler');
    Route::get('/add', 'AddPersonController@index')->name('add-person');
    Route::post('/add', 'AddPersonController@handle')->name('add-person-handler');
    Route::get('/delete/{person}', 'DeletePersonController@index')->name('delete-person');
    Route::post('/delete/{person}', 'DeletePersonController@handle')->name('delete-person-handler');
});

Route::bind('person', static function ($personId): \App\Person {
    /*
     * refactored via chaos
     */
    return Person::query()
        ->where('id', '=', $personId)
        ->where('user_id', '=', Auth::id())
        ->firstOrFail();
});
