<?php

return [

  'name'  => 'signout',

  'ordering' => 3,

  'protected' => 1,
  'admin_only' => 0,

  'route' => [
    'title' => 'Sign out',
    'link'  => '\\Ivus\\CrudAdminLte\\Http\\Controllers\\Auth\\AuthController@getLogout',
    'icon'  => 'fa fa-power-off text-danger',
  ]

];
