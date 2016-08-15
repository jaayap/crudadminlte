<?php

return [

  'name'  => 'dashboard',

  'ordering' => 0,

  'protected' => 1,
  'admin_only' => 0,

  'route' => [
    'title' => 'Dashboard',
    'link'  => '\\Lab25\\CrudAdminLte\\Http\\Controllers\\Admin\\HomeController@index',
    'icon'  => 'fa fa-dashboard',
  ]

];
