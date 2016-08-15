<?php namespace Lab25\CrudAdminLte\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Contracts\Validation\Validator;

abstract class AdminController extends BaseController {

	use DispatchesJobs, ValidatesRequests;

	// /**
	//  * Create a new controller instance.
	//  *
	//  * @return void
	//  */
	// public function __construct() {
	// 	$this->middleware('auth');
	// 	$this->config	= \aLTE::listLayout();
	// 	$this->init		= \UI::initAdmin();
	// }

	// /**
  //  * {@inheritdoc}
  //  */
  // protected function formatValidationErrors(Validator $validator) {
  //   return $validator->errors()->all();
  // }

}
