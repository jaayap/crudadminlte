<?php namespace Lab25\CrudAdminLte\Http\Facades;

use Illuminate\Support\Facades\Facade;

class MsgClass extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
      return 'msghelper';
    }

}
