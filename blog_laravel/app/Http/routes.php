<?php

Route::group(['namespace' => 'Admin'], function () {
		Route::get('admin/login', [
	    	'as' => 'admin.login', 'uses' => 'AuthController@login'
		]);
		Route::post('admin/checkLogin', [
		    'as' => 'admin.checkLogin', 'uses' => 'AuthController@checkLogin'
		]);

		Route::group(['prefix' => 'admin', 'middleware' => 'isAdmin'], function () {
				Route::group(['prefix' => 'dashboard'], function () {
						Route::get('/', ['as' => 'admin.dashboard', function () {
								return view('admin.dashboard.dashboard');
						}]);
				});

				Route::group(['prefix' => 'user'], function () {
						Route::get('index', [
								'as' => 'admin.user.index', 'uses' => 'UserController@index'
						]);
						Route::get('create', [
								'as' => 'admin.user.create', 'uses' => 'UserController@create'
						]);
						Route::post('store', [
								'as' => 'admin.user.store', 'uses' => 'UserController@store'
						]);
						Route::get('edit/{id}', [
								'as' => 'admin.user.edit', 'uses' => 'UserController@edit'
						]);
						Route::post('update/{id}', [
								'as' => 'admin.user.update', 'uses' => 'UserController@update'
						]);
						Route::get('destroy/{id}', [
								'as' => 'admin.user.destroy', 'uses' => 'UserController@destroy'
						]);
				});

				Route::group(['prefix' => 'post'], function () {
						Route::get('index', [
								'as' => 'admin.post.index', 'uses' => 'PostController@index'
						]);
						Route::get('create', [
								'as' => 'admin.post.create', 'uses' => 'PostController@create'
						]);
						Route::post('store', [
								'as' => 'admin.post.store', 'uses' => 'PostController@store'
						]);
						Route::get('edit/{id}', [
								'as' => 'admin.post.edit', 'uses' => 'PostController@edit'
						]);
						Route::post('update/{id}', [
								'as' => 'admin.post.update', 'uses' => 'PostController@update'
						]);
						Route::get('destroy/{id}', [
								'as' => 'admin.post.destroy', 'uses' => 'PostController@destroy'
						]);
				});

				Route::group(['prefix' => 'comment'], function () {
						Route::get('index/{pid}', [
								'as' => 'admin.comment.index', 'uses' => 'CommentController@index'
						]);
						Route::get('destroy/{id}', [
								'as' => 'admin.comment.destroy', 'uses' => 'CommentController@destroy'
						]);
				});
		});
});

Route::group(['namespace' => 'Blog'], function () {
		Route::get('/', [
				'as' => 'blog.page.index', 'uses' => 'PageController@index'
		]);
		Route::get('post/{id}/{slug}.html', [
				'as' => 'blog.page.post', 'uses' => 'PageController@post'
		]);
		Route::get('search', [
				'as' => 'blog.page.search', 'uses' => 'PageController@search'
		]);
		Route::post('comment/store/{pid}', [
				'as' => 'blog.comment.store', 'uses' => 'CommentController@store'
		]);
		Route::post('checkLogin', [
		    'as' => 'blog.checkLogin', 'uses' => 'AuthController@checkLogin'
		]);
		Route::post('register', [
		    'as' => 'blog.register', 'uses' => 'AuthController@register'
		]);
		Route::get('logout', [
		    'as' => 'logout', 'uses' => 'AuthController@logout'
		]);
});