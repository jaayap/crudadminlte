<?php namespace Lab25\CrudAdminLte\Http\Controllers\Admin\System;

use Lab25\CrudAdminLte\Http\Models\User;
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
		// $this->config	= \aLTE::listLayout();
		// $this->init		= \UI::initAdmin();
	}

	public function index() {
		return view('crudadminlte::admin.system.index');
	}

	public function info() {
		return view('crudadminlte::admin.system.info');
	}

}
