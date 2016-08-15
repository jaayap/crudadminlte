<?php

return [

  'name'  => 'settings',

  'ordering' => 2,

  'protected' => 1,
  'admin_only' => 1,

  'route' => [
    'title' => 'Settings',
    'link'  => '',
    'icon'  => 'fa fa-cogs',

    'sub'  => [
      [
        'title' => 'Site Settings',
        'link'  => '\\Lab25\\CrudAdminLte\\Http\\Controllers\\Admin\\System\\SystemController@index',
        'icon'  => 'fa fa-wrench',
      ],[
        'title' => 'System Info.',
        'link'  => '\\Lab25\\CrudAdminLte\\Http\\Controllers\\Admin\\System\\SystemController@info',
        'icon'  => '',
      ],
    ],

  ],

];
