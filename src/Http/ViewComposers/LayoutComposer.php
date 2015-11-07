<?php namespace Lab25\CrudAdminLte\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Session;

class LayoutComposer
{

    /**
     * Create a layout composer.
     *
     * @return void
     */
    public function __construct()
    {
      // Dependencies automatically resolved by service container...
      // \_e::pre( Session::get('_scripts') );
      $this->_scripts = Session::get('_scripts');
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function create(View $view)
    {
      // $view->with('count', $this->users->count());
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
      $view->with('_scripts', $this->_scripts);
    }
}
