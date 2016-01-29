<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', 'HomeController@index');

    // Admin route groups
    Route::group(['middleware' => ['Administrators','auth']], function() {
	Route::get('/Admin', ['uses' => 'AdminController@index']);
	Route::get('/Admin/Scores', ['uses' => 'AdminController@Scores']);
	Route::get('/Admin/testscore', ['uses' => 'AdminController@testscore']);
	Route::post('/Admin/SubmitScore', ['uses' => 'AdminController@SubmitScore']);
	Route::post('/Admin/SubmitScoreFinal', ['uses' => 'AdminController@SubmitScoreFinal']);
    });

    // Logged-in users Game route groups
    Route::group(['middleware' => 'auth'], function() {
	Route::get('/Game', ['uses' => 'GameController@index']);
	Route::post('/Game/SubmitScore', ['uses' => 'GameController@SubmitScore']);
	Route::post('/Game/testajax', ['uses' => 'GameController@SubmitScore']);
    });
});


Route::get('/show-autoloaders', function() {
	foreach(spl_autoload_functions() as $callback)
	{
		if(is_string($callback))
		{
			echo '- ', $callback, "\n<br>\n";
		}

		else if(is_array($callback))
		{
			if(is_object($callback[0]))
			{
				echo '- ', get_class($callback[0]);
			}
			elseif(is_string($callback[0]))
			{
				echo '- ', $callback[0];
			}
			echo '::', $callback[1], "\n<br\n";
		}
		else
		{
			var_dump($callback);
		}
	}
});
