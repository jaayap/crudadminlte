<?php namespace Ivus\CrudAdminLte;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class CrudAdminLteServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	public function boot()
	{

		// LOAD VIEWS FROM FOLDER
		$this->loadViewsFrom(realpath(__DIR__.'/../views'), 'crudadminlte');

		// LOAD TRANSLATION FILES
		$this->loadTranslationsFrom(__DIR__.'/../lang', 'crudadminlte');

		// echo '<pre>'; print_r( realpath(__DIR__.'/../assets') ); echo '</pre>'; exit;

		// LOAD ROUTES
		$this->setupRoutes($this->app->router);

		// VIEW CREATORS
			// CLASS BASED
			view()->creator(
				'crudadminlte::admin._tmpl.layout', __NAMESPACE__.'\\Http\\ViewComposers\\LayoutComposer'
	    );
			// CLOSURE BASED
	    // view()->creator('*', function ($view) {
	    // });

		// VIEW COMPOSERS
			// CLASS BASED
			view()->composer(
				// 'crudadminlte::test', __NAMESPACE__.'\\Http\\ViewComposers\\TestComposer',
				'crudadminlte::admin._tmpl.layout', __NAMESPACE__.'\\Http\\ViewComposers\\LayoutComposer'
	    );
			// CLOSURE BASED
			// view()->composer('*', function ($view) {
	    // });

		// PUBLISH CONFIG
		$srcFld		= __DIR__.'/../publish/';
		$destFld	= 'vendor/CrudAdminLte/';
		$this->publishes([
			// Config files for CRUD JS scripts and CSS source files
			// __DIR__.'/config/adminltesource.php' 		=> config_path($destFld.'adminltesource.php'),
			$srcFld.'config/adminltesource.php' 				=> config_path($destFld.'adminltesource.php'),
			// Config files for CRUD router scaffold
			$srcFld.'config/crud/accesscontrol.php'			=> config_path($destFld.'crud/accesscontrol.php'),
			$srcFld.'config/crud/dashboard.php' 				=> config_path($destFld.'crud/dashboard.php'),
			$srcFld.'config/crud/settings.php' 					=> config_path($destFld.'crud/settings.php'),
			$srcFld.'config/crud/signout.php' 					=> config_path($destFld.'crud/signout.php'),
			// JS default setting for ACE Editor
			$srcFld.'config/defaults/aceeditor.php'			=> config_path($destFld.'defaults/aceeditor.php'),
			// Config files for Form/View scaffold
			$srcFld.'config/admin/acl/users.php'				=> config_path($destFld.'admin/acl/users.php'),
			$srcFld.'config/admin/acl/userstabs.php'		=> config_path($destFld.'admin/acl/userstabs.php'),
		]);
		// $this->mergeConfigFrom(
    //   __DIR__.'/config/adminltesource.php', 'adminltesource'
    // );

		// PUBLISH ASSETS
		$this->publishes([
      $srcFld.'assets' 		=> public_path(strToLower($destFld)),
    ], 'assets');
		$this->publishes([
      $srcFld.'profile' 	=> public_path('profile'),
    ], 'profile');

		// EXTEND BLADE VIEW
		\Blade::extend(function($value) { // @define $i = $v;
			return preg_replace('/\@define(.+)/', '<?php ${1}; ?>', $value);
		});
		\Blade::extend(function($value) { // {? $i = $v; ?}
			return preg_replace('/\{\?(.+)\?\}/', '<?php ${1} ?>', $value);
		});

	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function setupRoutes(Router $router)
	{
		$router->group(['namespace' => 'Ivus\CrudAdminLte\Http\Controllers'], function($router) {
			require __DIR__.'/Http/routes.php';
		});
	}

	public function register()
	{

		$this->_registerCrudAdminLte();
		$this->_registerAdminLTEClass();
		$this->_registerFormHelperClass();
		$this->_registerFieldHelperClass();
		$this->_registerMsgClass();
		$this->_registerSiteHelperClass();
		$this->_registerUIClass();
		$this->_registerUtilityClass();

		$this->_registerHtmlFormClass();

	}

		private function _registerCrudAdminLte()
		{
			$this->app->bind('crud',function($app){
				return new CrudAdminLte($app);
			});
		}

		private function _registerAdminLTEClass()
		{
			// Register 'underlyingclass' instance container to our UnderlyingClass object
			$this->app['adminlte'] = $this->app->share(function($app) {
				return new \Ivus\CrudAdminLte\Http\Services\AdminLTEClass;
			});
			// Shortcut so developers don't need to add an Alias in app/config/app.php
			$this->app->booting(function() {
				$loader		= \Illuminate\Foundation\AliasLoader::getInstance();
				$loader->alias('aLTE', '\Ivus\CrudAdminLte\Http\Facades\AdminLTEClass');
			});
		}

		private function _registerFormHelperClass()
		{
			// Register 'underlyingclass' instance container to our UnderlyingClass object
			$this->app['formhelper'] = $this->app->share(function($app) {
				return new \Ivus\CrudAdminLte\Http\Services\FormHelperClass;
			});
			// Shortcut so developers don't need to add an Alias in app/config/app.php
			$this->app->booting(function() {
				$loader		= \Illuminate\Foundation\AliasLoader::getInstance();
				$loader->alias('FormHelper', '\Ivus\CrudAdminLte\Http\Facades\FormHelperClass');
			});
		}

		private function _registerFieldHelperClass()
		{
			// Register 'underlyingclass' instance container to our UnderlyingClass object
			$this->app['fieldhelper'] = $this->app->share(function($app) {
				return new \Ivus\CrudAdminLte\Http\Services\FieldHelperClass;
			});
			// Shortcut so developers don't need to add an Alias in app/config/app.php
			$this->app->booting(function() {
				$loader		= \Illuminate\Foundation\AliasLoader::getInstance();
				$loader->alias('DrawField', '\Ivus\CrudAdminLte\Http\Facades\FieldHelperClass');
			});
		}

		private function _registerMsgClass()
		{
			// Register 'underlyingclass' instance container to our UnderlyingClass object
			$this->app['msghelper'] = $this->app->share(function($app) {
				return new \Ivus\CrudAdminLte\Http\Services\MsgClass;
			});
			// Shortcut so developers don't need to add an Alias in app/config/app.php
			$this->app->booting(function() {
				$loader		= \Illuminate\Foundation\AliasLoader::getInstance();
				$loader->alias('Msg', '\Ivus\CrudAdminLte\Http\Facades\MsgClass');
			});
		}

		private function _registerSiteHelperClass()
		{
			// Register 'underlyingclass' instance container to our UnderlyingClass object
			$this->app['sitehelper'] = $this->app->share(function($app) {
				return new \Ivus\CrudAdminLte\Http\Services\SiteHelperClass;
			});
			// Shortcut so developers don't need to add an Alias in app/config/app.php
			$this->app->booting(function() {
				$loader		= \Illuminate\Foundation\AliasLoader::getInstance();
				$loader->alias('SiteHelper', '\Ivus\CrudAdminLte\Http\Facades\SiteHelperClass');
			});
		}

		private function _registerUIClass()
		{
			// Register 'underlyingclass' instance container to our UnderlyingClass object
			$this->app['uihelper'] = $this->app->share(function($app) {
				return new \Ivus\CrudAdminLte\Http\Services\UIClass;
			});
			// Shortcut so developers don't need to add an Alias in app/config/app.php
			$this->app->booting(function() {
				$loader		= \Illuminate\Foundation\AliasLoader::getInstance();
				$loader->alias('UI', '\Ivus\CrudAdminLte\Http\Facades\UIClass');
			});
		}

		private function _registerUtilityClass()
		{
			// Register 'underlyingclass' instance container to our UnderlyingClass object
			$this->app['utilityhelper'] = $this->app->share(function($app) {
				return new \Ivus\CrudAdminLte\Http\Services\UtilityClass;
			});
			// Shortcut so developers don't need to add an Alias in app/config/app.php
			$this->app->booting(function() {
				$loader		= \Illuminate\Foundation\AliasLoader::getInstance();
				$loader->alias('_e', '\Ivus\CrudAdminLte\Http\Facades\UtilityClass');
			});
		}

		private function _registerHtmlFormClass()
		{
			/*
	     * Register the service provider for the dependency.
	     */
	    $this->app->register('\Illuminate\Html\HtmlServiceProvider');
	    /*
	     * Create aliases for the dependency.
	     */
	    $loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('Form', '\Illuminate\Html\FormFacade');
			$loader->alias('HTML', '\Illuminate\Html\HtmlFacade');
		}

}
