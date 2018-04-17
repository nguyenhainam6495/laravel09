<?php
// Route::get('', function() {
//     echo "<form action='/user' method='POST' role='form'>
//     		Username: <input type='text' name='username' placeholder='Input username!'>
//     		Password: <input type='password' name='password' placeholder='••••••'>
//     	<button type='submit' class='btn btn-primary'>Submit</button>
//     	<input type='hidden' name='_method' value='put'>
//     	". csrf_field() ." 
//     </form>";
// });

// Route::put('user', function(){
// 	echo "...";
// });
Route::prefix('admin')->group(function(){

	Route::resource('products', 'ProductController');
// 		Route::get('products','ProductController@index')->name('products.index');
// 		Route::get('products/{id}','ProductController@show');
// 		Route::post('products/store','ProductController@store');
// 		Route::put('products/{id}','ProductController@update');
// 		Route::delete('products/{id}','ProductController@destroy');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function(){
	Route::middleware('auth')->group(function(){
		Route::get('/dashboard', function(){
			dd('dashboard');
		});
	});
});

Route::prefix('admin')->group(function(){
	// Authentication Routes...
        Route::get('login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
        Route::post('login', 'AdminAuth\LoginController@login')->name('admin.authenciate');
        Route::post('logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

        // Registration Routes...
        Route::get('register', 'AdminAuth\RegisterController@showRegistrationForm')->name('admin.register');
       	Route::post('register', 'AdminAuth\RegisterController@register')->name('admin.signin');	

        // Password Reset Routes...
        Route::get('password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
        Route::post('password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
        Route::get('password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm')->name('admin.password.reset');
        Route::post('password/reset', 'AdminAuth\ResetPasswordController@reset');
});
