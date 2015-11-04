<?php namespace Ivus\CrudAdminLte\Http\Services;

use DB;

class UtilityClass {

  protected $items;

	public function pre($items) {
		echo '<pre>'; print_r($items); echo '</pre>';
	}

	public function prex($items) {
		echo '<pre>'; print_r($items); echo '</pre>'; exit;
	}

	public function dd($items) {
		die(print_r($items));
	}

	public function xx($items) {
		exit(print_r($items));
	}

	public function vd($items) {
		var_dump($items);
	}

	public function sql() {
		$queries	= DB::getQueryLog();
		echo '<pre>'; print_r($queries); echo '</pre>';
	}

}
