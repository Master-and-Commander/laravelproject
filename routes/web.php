<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

// General routes
Route::get('/', ['uses' => 'WelcomeController@generateMain']);
Route::get('/creatures/{type}', ['uses' => 'CreatureController@generateMainArticle']);
Route::get('/creatures/{type}/{id}', ['uses' => 'CreatureController@generateTypeArticle']);


//ajax functions
Route::post('/ajax/carousel', 'AjaxController@carouselHandler');
Route::post('/ajax/buildspecific', 'AjaxController@buildSpecific');
Route::post('/ajax/getlatin', 'AjaxController@getLatinNames');

Route::get('/search/{search}', ['uses' => 'SearchController@search']);
Route::get('/build/{flavor}', ['uses' => 'BuildController@build']);
Route::get('/article/{id}', ['uses' => 'ArticleController@generateArticle'] );

Route::get('/setup', ['uses' => 'SetupController@showGeneral']);
Route::get('/games', ['uses' => 'GameController@showGeneral']);
Route::get('/games/chess', ['uses' => 'GameController@showChess']);
Route::get('/about', ['uses' => 'SiteController@showAbout'] );
Route::get('/editprofile', ['uses' => 'UserController@showGeneral']);



//* user content

//Fields: user_id, Name, description
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');

//* Buddy Routing

// Fields: species_id, latin_name, common_names, description,  
Route::get('/spider/{spider}', ['uses' => 'SpiderController@showBuddy']);
Route::get('/scorpion/{scorpion}', ['uses' => 'ScorpionController@showBuddy']);

// Fields: Buddy_id, species_id, user_id, description
Route::get('/myspider/{spider}', ['uses' => 'SpiderController@showSpecific']);
Route::get('/myscorpion/{scorpion}', ['uses' => 'ScorpionController@showSpecific']);




// setup routes
Route::get('/setup/{setup}', ['uses' => 'SetupController@showSpecific']);

//games
Route::get('/games', ['uses' => 'GameController@showGeneral']);


Auth::routes();

