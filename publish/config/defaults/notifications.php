<?php

return [
	'enabled'	=> 1,
	'pollinterval' => '150000', // in millseconds
	'buckets' => [

		[
			'name'		=> 'Messages',
			'icon'		=> 'fa fa-envelope-o',
			'ajaxurl'	=> '\Lab25\CrudAdminLte\Http\Controllers\Admin\AjaxController@systemWelcome', // CLOSURE
			'badge'		=> [
				'enabled'	=> TRUE,
				'color'		=> 'success', // 'success','info','danger','warning'
			],
			'viewall'	=> [
					'enabled'	=> 1,
					'label'		=> 'See All Messages',
					'link'		=> '#',	// CLOSURE
			]
		],
		[
			'name'		=> 'Notifications',
			'icon'		=> 'fa fa-bell-o',
			'ajaxurl'	=> '', //'\Lab25\CrudAdminLte\Http\Controllers\Admin\AjaxController@systemWelcomeSecond', // CLOSURE
			'badge'		=> [
				'enabled'	=> TRUE,
				'color'		=> 'warning', // 'success','info','danger','warning'
			],
			'viewall'	=> [
					'enabled'	=> 1,
					'label'		=> 'View all',
					'link'		=> '#',	// CLOSURE
			]
		],
		// [
		// 	'name'		=> 'Tasks',
		// 	'icon'		=> 'fa fa-flag-o',
		// 	'ajaxurl'	=> '', // CLOSURE
		// 	'badge'		=> [
		// 		'enabled'	=> TRUE,
		// 		'color'		=> 'danger', // 'success','info','danger','warning'
		// 	],
		// 	'viewall'	=> [
		// 			'enabled'	=> 1,
		// 			'label'		=> 'See All Tasks',
		// 			'link'		=> '#',	// CLOSURE
		// 	]
		// ],

	],

];
