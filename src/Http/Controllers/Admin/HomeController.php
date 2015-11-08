<?php namespace Lab25\CrudAdminLte\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

use Kodeine\Acl\Models\Eloquent\Permission;
use Kodeine\Acl\Models\Eloquent\Role;

class HomeController extends AdminController {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index() {
		return view('crudadminlte::admin.welcome');
	}

}
