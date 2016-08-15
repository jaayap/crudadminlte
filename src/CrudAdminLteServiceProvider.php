<?php namespace Lab25\CrudAdminLte;

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
      $srcFld.'config' 	=> config_path($destFld)
    ], 'config');
		// $this->mergeConfigFrom(
    //   __DIR__.'/config/adminltesource.php', 'adminltesource'
    // );

		// PUBLISH ASSETS
		$this->publishes([
      $srcFld.'assets' 		=> public_path(strToLower($destFld))
    ], 'assets');
		$this->publishes([
      $srcFld.'profile' 	=> public_path('profile')
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
		$router->group(['namespace' => 'Lab25\CrudAdminLte\Http\Controllers'], function($router) {
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
				return new \Lab25\CrudAdminLte\Http\Services\AdminLTEClass;
			});
			// Shortcut so developers don't need to add an Alias in app/config/app.php
			$this->app->booting(function() {
				$loader		= \Illuminate\Foundation\AliasLoader::getInstance();
				$loader->alias('aLTE', '\Lab25\CrudAdminLte\Http\Facades\AdminLTEClass');
			});
		}

		private function _registerFormHelperClass()
		{
			// Register 'underlyingclass' instance container to our UnderlyingClass object
			$this->app['formhelper'] = $this->app->share(function($app) {
				return new \Lab25\CrudAdminLte\Http\Services\FormHelperClass;
			});
			// Shortcut so developers don't need to add an Alias in app/config/app.php
			$this->app->booting(function() {
				$loader		= \Illuminate\Foundation\AliasLoader::getInstance();
				$loader->alias('FormHelper', '\Lab25\CrudAdminLte\Http\Facades\FormHelperClass');
			});
		}

		private function _registerFieldHelperClass()
		{
			// Register 'underlyingclass' instance container to our UnderlyingClass object
			$this->app['fieldhelper'] = $this->app->share(function($app) {
				return new \Lab25\CrudAdminLte\Http\Services\FieldHelperClass;
			});
			// Shortcut so developers don't need to add an Alias in app/config/app.php
			$this->app->booting(function() {
				$loader		= \Illuminate\Foundation\AliasLoader::getInstance();
				$loader->alias('DrawField', '\Lab25\CrudAdminLte\Http\Facades\FieldHelperClass');
			});
		}

		private function _registerMsgClass()
		{
			// Register 'underlyingclass' instance container to our UnderlyingClass object
			$this->app['msghelper'] = $this->app->share(function($app) {
				return new \Lab25\CrudAdminLte\Http\Services\MsgClass;
			});
			// Shortcut so developers don't need to add an Alias in app/config/app.php
			$this->app->booting(function() {
				$loader		= \Illuminate\Foundation\AliasLoader::getInstance();
				$loader->alias('Msg', '\Lab25\CrudAdminLte\Http\Facades\MsgClass');
			});
		}

		private function _registerSiteHelperClass()
		{
			// Register 'underlyingclass' instance container to our UnderlyingClass object
			$this->app['sitehelper'] = $this->app->share(function($app) {
				return new \Lab25\CrudAdminLte\Http\Services\SiteHelperClass;
			});
			// Shortcut so developers don't need to add an Alias in app/config/app.php
			$this->app->booting(function() {
				$loader		= \Illuminate\Foundation\AliasLoader::getInstance();
				$loader->alias('SiteHelper', '\Lab25\CrudAdminLte\Http\Facades\SiteHelperClass');
			});
		}

		private function _registerUIClass()
		{
			// Register 'underlyingclass' instance container to our UnderlyingClass object
			$this->app['uihelper'] = $this->app->share(function($app) {
				return new \Lab25\CrudAdminLte\Http\Services\UIClass;
			});
			// Shortcut so developers don't need to add an Alias in app/config/app.php
			$this->app->booting(function() {
				$loader		= \Illuminate\Foundation\AliasLoader::getInstance();
				$loader->alias('UI', '\Lab25\CrudAdminLte\Http\Facades\UIClass');
			});
		}

		private function _registerUtilityClass()
		{
			// Register 'underlyingclass' instance container to our UnderlyingClass object
			$this->app['utilityhelper'] = $this->app->share(function($app) {
				return new \Lab25\CrudAdminLte\Http\Services\UtilityClass;
			});
			// Shortcut so developers don't need to add an Alias in app/config/app.php
			$this->app->booting(function() {
				$loader		= \Illuminate\Foundation\AliasLoader::getInstance();
				$loader->alias('_e', '\Lab25\CrudAdminLte\Http\Facades\UtilityClass');
			});
		}

		private function _registerHtmlFormClass()
		{
		/*
	     * Register the service provider for the dependency.
	     */
	    $this->app->register('\Collective\Html\HtmlServiceProvider');
	    /*
	     * Create aliases for the dependency.
	     */
	    $loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('Form', '\Collective\Html\FormFacade');
			$loader->alias('HTML', '\Collective\Html\HtmlFacade');
		}

}
