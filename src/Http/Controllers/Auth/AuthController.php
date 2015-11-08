<?php namespace Lab25\CrudAdminLte\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

use Lab25\CrudAdminLte\Http\Requests\Auth\LoginRequest;
use Lab25\CrudAdminLte\Http\Requests\Auth\RegisterRequest;

use Illuminate\Cookie\CookieJar;
use Lab25\CrudAdminLte\Http\Controllers\CrudAdminLteController as CrudAdminLteController;

class AuthController extends CrudAdminLteController {

	/**
	 * the model instance
	 * @var User
	 */
	protected $user;
	/**
	 * The Guard implementation.
	 *
	 * @var Authenticator
	 */
	protected $auth;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param	Authenticator	$auth
	 * @return void
	 */
	public function __construct(
		Guard $auth,
		User $user
	) {
		$this->user = $user;
		$this->auth = $auth;

		$this->middleware('guest', ['except' => ['getLogout']]);
	}

	/**
	 * Show the application registration form.
	 *
	 * @return Response
	 */
	public function getRegister() {
		return view('auth.register');
	}

	/**
	 * Handle a registration request for the application.
	 *
	 * @param	RegisterRequest	$request
	 * @return Response
	 */
	public function postRegister(RegisterRequest $request) {
		//code for registering a user goes here.
		$this->auth->login($this->user);
		die('x');
		return redirect('/home');
	}

	/**
	 * Show the application login form.
	 *
	 * @return Response
	 */
	public function getLogin() {
		return view('crudadminlte::auth.login');
	}

	/**
	 * Handle a login request to the application.
	 *
	 * @param	LoginRequest	$request
	 * @return Response
	 */
	public function postLogin(LoginRequest $request, CookieJar $cookieJar) {

		$login = $request->only('email', 'password');
		$login['active'] = 1; // ENSURE USER IS ACTIVE
		if ($this->auth->attempt( $login, true )) {
			$_u = array(
				'name'	=> $this->auth->user()->name,
				'email'	=> $this->auth->user()->email,
			);
			$cookieJar->queue('lastLogin', $_u, (60 * 24 * 365));//, '/', url());
			return redirect()->intended('\Lab25\CrudAdminLte\Http\Controllers\Admin\HomeController@index');
			//return redirect()->action('\Lab25\CrudAdminLte\Http\Controllers\Admin\HomeController@index');
		};

		return redirect('/auth/login')->withErrors([
			'email' => 'The credentials you entered did not match our records. Try again?',
		]);
	}

	/**
	 * Log the user out of the application.
	 *
	 * @return Response
	 */
	public function getLogout() {
		$this->auth->logout();
		return redirect()->action('\Lab25\CrudAdminLte\Http\Controllers\Admin\HomeController@index');
	}

	/**
	 * Clear the LastLogin cookie.
	 *
	 * @return Response
	 */
	public function getReset(CookieJar $cookieJar) {
		$cookie = $cookieJar->forget('lastLogin');
		return redirect()->action('\Lab25\CrudAdminLte\Http\Controllers\Admin\HomeController@index')
			->withCookie($cookie);
	}

}
