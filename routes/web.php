<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

// General routes
Route::get('/', ['uses' => 'WelcomeController@generateMain']);


//ajax functions
Route::post('/ajax/carousel', 'AjaxController@carouselHandler');
Route::post('/ajax/buildspecific', 'AjaxController@buildSpecific');
Route::post('/ajax/getlatin', 'AjaxController@getLatinNames');

Route::get('/search/{search}', ['uses' => 'SearchController@search']);
Route::get('/admin/build', ['uses' => 'BuildController@build']);
Route::get('/article/{id}', ['uses' => 'ArticleController@generateArticle'] );

Route::get('/setup', ['uses' => 'SetupController@showGeneral']);
Route::get('/games', ['uses' => 'GameController@showGeneral']);
Route::get('/games/chess', ['uses' => 'GameController@showChess']);
Route::get('/about', ['uses' => 'SiteController@showAbout'] );
Route::get('/editprofile', ['uses' => 'UserController@showGeneral']);



//* user content

//Fields: user_id, Name, description
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');

// Fields: species_id, latin_name, common_names, description,  
Route::get('/plants/{plant}', ['uses' => 'PlantController@generatePlant']);
Route::get('/fish/{fish}', ['uses' => 'FishController@generateFish']);

// Fish and Plants all

Route::get('/fish', ['uses' => 'FishController@general']);
Route::get('/plants', ['uses' => 'PlantController@general']);





// setup routes
Route::get('/setup/{setup}', ['uses' => 'SetupController@showSpecific']);

//games
Route::get('/games', ['uses' => 'GameController@showGeneral']);


Auth::routes();

