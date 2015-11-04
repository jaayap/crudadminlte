<?php

  //Route::get('suvi', 'CrudAdminLteController@index');

  // Route::get('admin', [
  //   'uses' => 'CrudAdminLteController@index',
  //   'as' => 'admin'
  // ]);

  Route::group([
    'namespace'   => 'Admin',
    'prefix'      => 'admin',
    'middleware'  => 'auth'
  ], function() {

		Route::get('test', [
			'uses' => 'CrudController@test',
		]);

		Route::get('', [
      'uses'  => 'HomeController@index',
      'as'    => 'crud_admin'
		]);

		Route::group([
				'namespace' => 'ACL',
				'prefix' => 'acl',
			], function() {

				Route::get('', 'ACLController@index');

				Route::group([
						'prefix' => 'users',
					], function() {

						Route::get('', 'UserController@index');

						Route::get('add', 'UserController@add');
						Route::post('save', 'UserController@store');

						Route::get('edit/{id}', 'UserController@edit');
						Route::post('update/{id}', 'UserController@update');

						Route::get('publish/{id}', 'UserController@publish');

						Route::get('delete/{id}', 'UserController@destroy');
						Route::get('archive/{id}', 'UserController@archive');

				});

        Route::group([
						'prefix' => 'userstabs',
					], function() {

						Route::get('', 'UsertabsController@index');

						Route::get('add', 'UsertabsController@add');
						Route::post('save', 'UsertabsController@store');

						Route::get('edit/{id}', 'UsertabsController@edit');
						Route::post('update/{id}', 'UsertabsController@update');

						Route::get('publish/{id}', 'UsertabsController@publish');

						Route::get('delete/{id}', 'UsertabsController@destroy');
						Route::get('archive/{id}', 'UsertabsController@archive');

				});

				Route::get('roles', [
					'uses' => 'RolesController@index',
				]);

				Route::get('permissions', [
					'uses' => 'PermissionsController@index',
				]);

		});

		Route::group([
				'namespace' => 'System',
				'prefix' => 'system',
			], function() {

				Route::get('', [
					'uses' => 'SystemController@index',
					'as' => 'settings'
				]);

				Route::get('serverinfo', [
					'uses' => 'SystemController@info',
					'as' => 'sysInfo'
				]);

		});

		// HELPER FUNCTIONS

		Route::post('_search', [
			'uses' => 'CrudController@search',
			'as' => 'search'
		]);
		Route::post('_filter', [
			'uses' => 'CrudController@filter',
			'as' => 'filter'
		]);

  });

  Route::group([
    'namespace'   => 'Auth',
    'prefix'      => 'auth',
	], function() {

		Route::get('logout', [
			'as'   => 'logout',
			'uses' => 'AuthController@getLogout'
		]);

		Route::get('clear', [
			'as'   => 'auth_reset',
			'uses' => 'AuthController@getReset'
		]);

		Route::get('login', [
			'as'   => 'crud_auth_signin',
			'uses' => 'AuthController@getLogin'
		]);

		Route::post('login', [
			'as'   => 'crud_auth_check',
			'uses' => 'AuthController@postLogin'
		]);

		Route::controllers([
			//'auth'    => 'AuthController',
      'password'  => 'PasswordController',
		]);

  });
