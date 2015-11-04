<?php namespace Ivus\CrudAdminLte\Http\Facades;

use Illuminate\Support\Facades\Facade;

class AdminLTEClass extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
      return 'adminlte';
    }

}
