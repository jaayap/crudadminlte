<?php namespace Lab25\CrudAdminLte\Http\Controllers\Admin\ACL;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

use Kodeine\Acl\Models\Eloquent\Permission;
use Kodeine\Acl\Models\Eloquent\Role;

use Route;

class ACLController extends \Lab25\CrudAdminLte\Http\Controllers\Admin\AdminController {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
		$this->config = \aLTE::listLayout();
		$this->init = \UI::initAdmin();
	}

	public function index() {
		return redirect()->action('Admin\ACL\ACLController@users');
	}

	//-------- USERS

	public function users() {

		$_config = $this->config;
		$_z = $this->init;

		//\_e::prex($_z->pagination['perPage']);

		$users = User::raw('where 1=1');

		/*
							->where('user_type','=','REGISTERED')
							->where('parent_id','=',0)
							->whereIn('active',array(0,1,-1));
		*/

		if (count($_config['searchable']) > 0) {
			if ($_z->searchterm) {
				$searchterm = $_z->searchterm;
				$users	= $users->where( function($users) use ($searchterm, $_config) {
					foreach ($_config['searchable'] as $srchKey) {
						$users->orWhere($srchKey, 'like', '%'.$searchterm.'%');
					};
				});
			};
		};

		/*
		if ($filterby) {
			foreach ($filterby as $f=>$v) {
				$_total->where($f, '=', $v);
			};
		}
		*/

		$users		= $users->orderBy($_z->orderby,$_z->dir);

		$data = [
			'current' => Route::getCurrentRoute()->getAction(),
			'total' => $users->count(),
			'data' => $users->paginate($_z->pagination['perPage'])
		];

		//\_e::sql();
		//\_e::prex($users);
		//\_e::prex($data);

		return view('admin._tmpl.list')
						->with('_data', array_merge($_config, $data) );
	}

	public function usersNew() {
		$data = new User();
		return view('admin._tmpl.form')
						->with('type', 'NEW')
						->with('config', $this->config)
						->with('_data', $data);
	}

	public function usersEdit($id) {
		$data = User::find($id);
		return view('admin._tmpl.form')
						->with('type', 'EDIT')
						->with('config', $this->config)
						->with('_data', $data);
	}

	//-------- ROLES

	public function roles() {
		return view('admin.acl.roles');
	}

	//-------- PERMISSIONS

	public function permissions() {
		return view('admin.acl.permissions');
	}

}
