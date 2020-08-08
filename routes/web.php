<?php

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

Route::get('/', 'Frontend\FrontController@index')->name('front.index');
Route::get('/article', 'Frontend\FrontController@article')->name('front.article');
Route::get('/category', function () {
    return redirect('/article');
});
Route::get('/category/{slug}', 'Frontend\FrontController@categoryArticle')->name('front.category');
Route::get('/article/{slug}', 'Frontend\FrontController@show')->name('front.show_article');
Route::post('/comment', 'Frontend\FrontController@comment');

Auth::routes();

Route::match(['get', 'post'],'/register', function () {
    return redirect('/login');
})->name('register');

Route::group([ 'middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('categories', 'CategoryController')->except(['create', 'show']);

    Route::resource('articles', 'ArticleController')->except(['show']);

    Route::get('comments', 'CommentController@index')->name('comments.index');
    Route::put('comments/{id}/publish', 'CommentController@publish')->name('comments.publish');
    Route::delete('comments/{id}/delete', 'CommentController@delete')->name('comments.delete');

    Route::get('settings', 'SettingController@index')->name('settings.index');
    Route::put('settings/update', 'SettingController@update')->name('settings.update');
    Route::match(['get', 'post'],'/settings/update', function () {
        return redirect('/settings');
    });

    Route::group(['prefix' => 'laravel-filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});


