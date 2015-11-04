<?php namespace Ivus\CrudAdminLte\Http\Facades;

use Illuminate\Support\Facades\Facade;

class SiteHelperClass extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
      return 'sitehelper';
    }

}
