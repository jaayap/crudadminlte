<?php namespace Ivus\CrudAdminLte\Http\Facades;

use Illuminate\Support\Facades\Facade;

class FormHelperClass extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
      return 'formhelper';
    }

}
