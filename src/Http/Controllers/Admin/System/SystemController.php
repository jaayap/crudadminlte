<?php namespace Ivus\CrudAdminLte\Http\Controllers\Admin\System;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

use Kodeine\Acl\Models\Eloquent\Permission;
use Kodeine\Acl\Models\Eloquent\Role;

class SystemController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		return view('crudadminlte::admin.system.index');
	}

	public function info() {
		return view('crudadminlte::admin.system.info');
	}

}
