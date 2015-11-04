<?php

return [

  'name'  => 'accesscontrol',

  'ordering' => 1,

  'protected' => 1,
  'admin_only' => 1,

  'route' => [
    'title' => 'Access Control',
    'link'  => '',
    'icon'  => 'fa fa-key',

    'sub'  => [
      [
        'title' => 'Users',
        'link'  => '\\Ivus\\CrudAdminLte\\Http\\Controllers\\Admin\\ACL\\UserController@index',
        'icon'  => 'fa fa-user',
      ],[
        'title' => 'Users Tab',
        'link'  => '\\Ivus\\CrudAdminLte\\Http\\Controllers\\Admin\\ACL\\UsertabsController@index',
        'icon'  => 'fa fa-user',
      ],[
        'title' => 'Groups/Roles',
        'link'  => '\\Ivus\\CrudAdminLte\\Http\\Controllers\\Admin\\ACL\\RolesController@index',
        'icon'  => '',
      ],[
        'title' => 'Permissions',
        'link'  => '\\Ivus\\CrudAdminLte\\Http\\Controllers\\Admin\\ACL\\PermissionsController@index',
      ],
    ],

  ],

];
