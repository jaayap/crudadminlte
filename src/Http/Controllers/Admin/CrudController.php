<?php namespace Ivus\CrudAdminLte\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

use Session, Route, Redirect, Request, URL;

class CrudController extends AdminController {


	public function test() {
		\_e::prex( Session::all() );
	}

	public function search() {

		$url = URL::previous();
		list($shorturl) = explode('?', $url);
		$src = Request::get('search');

		$sessLoc	= \UI::_getSession($shorturl);

		Session::put($shorturl, (object) array(
			'searchterm'	=> ($src == '----------------------------------------------------------------------------------/reset') ? NULL : $src
		,	'filterby'		=> (isset($sessLoc->filterby)) ? $sessLoc->filterby : NULL
		,	'orderby'		=> (isset($sessLoc->orderby)) ? $sessLoc->orderby : NULL
		,	'dir'			=> (isset($sessLoc->dir)) ? $sessLoc->dir : NULL
		,	'perpage'		=> (isset($sessLoc->perpage)) ? $sessLoc->perpage : NULL
		));

		return Redirect::to($shorturl);
	}

	public function filter() {
		die('filter');
		return redirect()->action('Admin\ACL\ACLController@users');
	}

}
