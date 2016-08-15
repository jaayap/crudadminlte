<?php namespace Lab25\CrudAdminLte\Http\Controllers\Admin\ACL;

use Lab25\CrudAdminLte\Http\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

use Request, Validator, Route, Input;

class UserController extends \Lab25\CrudAdminLte\Http\Controllers\Admin\AdminController {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
		$this->config	= \aLTE::listLayout();
		$this->init		= \UI::initAdmin();
	}

	public function index() {

		$_config = $this->config;
		$_z = $this->init;
		// \_e::prex($_z->pagination['perPage']);

		$users = User::where('id','>',0);
		/*
							raw('where 1=1');
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
			'current'	=> Route::getCurrentRoute()->getAction(),
			'total'		=> $users->count(),
			'data'		=> $users->paginate($_z->pagination['perPage'])
		];
		//\_e::sql();
		//\_e::prex($users);
		//\_e::prex($data);

		return view('crudadminlte::admin._tmpl.list')
						->with('_data', array_merge($_config, $data) );
	}

	public function add() {
		// \_e::prex($this->config);
		$data = new User();
		return view('crudadminlte::admin._tmpl.form')
						->with('type', 'NEW')
						->with('config', $this->config)
						->with('_data', $data);
	}

	public function store(Request $request) {

		\_e::prex( "Lab25\CrudAdminLte\Http\Controllers\Admin\ACL\UserController@store()" );

		$v = \UI::getValidation('NEW');
		$validator = Validator::make($request->all(), $v['validation'], $v['messages']);
		if ($validator->fails())
        return \Redirect::back()->withErrors($validator)->withInput();

		$input = $request->except(['_token']);
		$user = new User();
		$user->fill($input);

		if ($user->save()) {
			return \Redirect::action('Admin\ACL\UserController@index');
		} else {
			die('HANDLE ERROR HERE...');
		};

	}

	public function edit($id) {
		$data = User::find($id);
		// \_e::prex( $this->config );
		return view('crudadminlte::admin._tmpl.form')
						->with('type', 'EDIT')
						->with('config', $this->config)
						->with('_data', $data);
	}

	public function update($id) {

		// $v = \UI::getValidation('UPDATE');
		// \_e::prex( \Input::all() );

		$user = User::findOrFail($id);
		if ($user->updateUniques()) {
			return redirect()->route('crud_admin_manageusers');
		} else {
			return redirect()->back()->withErrors($user->errors());
		};
	}

	// public function updateBK($id, Request $request) {
	// 	$v = \UI::getValidation('UPDATE',$id);
	// 	$validator = Validator::make($request->all(), $v['validation'], $v['messages']);
	// 	if ($validator->fails())
  //     return \Redirect::back()->withErrors($validator)->withInput();
	//
	// 	$input = $request->except(['_token']);
	// 	$input = $request->all();
	// 	$user = User::findOrFail($id);
	// 	$user->fill($input);
	//
	// 	if ($user->save()) {
	// 		return redirect()->route('crud_admin_manageusers');
	// 	} else {
	// 		die('SOMETHING WENT HORRIBLY WRONG!!!');
	// 	};
	//
	// }

	public function publish($id) {
		$user = User::findOrFail($id);
		if (!in_array($user->active, [0,1])) return true;
		$user->active = !$user->active;
		if ($user->updateUniques()) {
			return redirect()->route('crud_admin_manageusers');
		} else {
			return redirect()->back()->withErrors($user->errors());
		};
	}

	public function archive($id) {
		die('..ARX');
		$user = User::findOrFail($id);
		if (!in_array($user->active, [0,1])) return true;
		$user->active = 9;
		if ($user->updateUniques()) {
			return redirect()->route('crud_admin_manageusers');
		} else {
			return redirect()->back()->withErrors($user->errors());
		};
	}

	public function destroy($id) {
		die('..DEL');
		$user = User::findOrFail($id);
		if (!in_array($user->active, [0,1])) return true;
		$user->active = -1;
		if ($user->updateUniques()) {
			return redirect()->route('crud_admin_manageusers');
		} else {
			return redirect()->back()->withErrors($user->errors());
		};
	}

}
