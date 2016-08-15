<?php namespace Lab25\CrudAdminLte\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class TestComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    //protected $users;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct() //UserRepository $users)
    {
      // Dependencies automatically resolved by service container...
      //$this->users = $users;
      // die('test... HMM?');
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function create(View $view)
    {
      echo 'create';
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
      echo 'compose';
      // $view->with('count', $this->users->count());
    }
}
