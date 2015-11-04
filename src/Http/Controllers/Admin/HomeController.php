<?php namespace Ivus\CrudAdminLte\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

use Kodeine\Acl\Models\Eloquent\Permission;
use Kodeine\Acl\Models\Eloquent\Role;

class HomeController extends AdminController {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index() {
		return view('crudadminlte::admin.welcome');
	}

}
