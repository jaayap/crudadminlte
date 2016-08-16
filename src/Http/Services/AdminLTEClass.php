<?php namespace Lab25\CrudAdminLte\Http\Services;

use Request, Route, Auth, View, Session;

class AdminLTEClass {

  public $defaultIcon;

  public function __construct() {
	$defaultIcon = 'fa fa-circle-o';
		$this->defaultIcon = $defaultIcon;
	Session::forget('_sysScripts');
	}

  public function drawRoute() {
	$routeArray = $this->_getConfig();
	$return = '';
	foreach ($routeArray as $route) {
	  if (isset($route['route'])) {
		if (isset($route['route']['sub'])) {
		  $return .= $this->_routeTree($route['route']);
		} else {
		  $return .= $this->_routeElement($route['route']);
		};
	  };
	};
	return $return;
  }

	private function _getConfig() {
	  $routeArray = array();
	  $searchPath = config_path('vendor'.DIRECTORY_SEPARATOR.'CrudAdminLte'.DIRECTORY_SEPARATOR.'crud');
	  $files = scandir($searchPath);
	  foreach ($files as $file) {
		if($file == '.' || $file == '..') continue;
		$routeArray[] = include $searchPath.DIRECTORY_SEPARATOR.$file;
	  };
	  $routeArray = $this->_sortArray($routeArray, 'ordering');
	  return $routeArray;
	}

	private function _sortArray($array,$orderby) {
	  $sortArray = array();
	  foreach($array as $_arr){
		foreach($_arr as $key=>$value){
		  if(!isset($sortArray[$key])){
			$sortArray[$key] = array();
		  };
		  $sortArray[$key][] = $value;
		};
	  };
	  array_multisort($sortArray[$orderby],SORT_ASC,$array);
	  return $array;
	}

	private function _routeTree($branch) {

	  //$path = Request::url();
	  $path = url(implode('/', array_slice(Request::segments(), 0, 3)));

	  $isActive = 0;
	  $_sub = '';
	  foreach ($branch['sub'] as $sub) {
		$link = (($sub['link'] != '' || $sub['link'] != NULL) ? action($sub['link']) : '#');
		if ($path == $link) $isActive = 1;
		$_sub .= $this->_routeElement($sub);
	  };

	  $return = '';
	  $return .= '<li class="treeview';
	  if ($isActive == 1) $return .= ' active';
	  $return .= '">';
	  $return .= '<a href="#">';
	  $return .= '<i class="'.( isset($branch['icon']) ? $this->_drawIcon($branch['icon']) : $this->_drawIcon() ).'"></i>';
	  $return .= '<span>'.$branch['title'].'</span>';
	  $return .= '<i class="fa fa-angle-left pull-right"></i>';
	  $return .= '</a>';
	  $return .= '<ul class="treeview-menu">'.$_sub.'</ul></li>';

	  return $return;
	}

	private function _routeElement($branch) {

	  //$path = Request::url();
	  $path = url(implode('/', array_slice(Request::segments(), 0, 3)));

	  $link = (($branch['link'] != '' || $branch['link'] != NULL) ? action($branch['link']) : '#');

	  $return = '<li';
	  if ($path == $link) $return .= ' class="active"';
	  $return .= '>';
	  $return .= '<a href="'.$link.'">';
	  $return .= '<i class="'.( isset($branch['icon']) ? $this->_drawIcon($branch['icon']) : $this->_drawIcon() ).'"></i>';
	  $return .= $branch['title'];
	  $return .= '</a></li>';
	  return $return;
	}

	private function _drawIcon($icon = NULL) {
	  return ((isset($icon) && ($icon != '' || $icon != NULL)) ? $icon : $this->defaultIcon);
	}

  public function listLayout() {
	$filename = Route::getCurrentRoute()->getAction();
		$searchPath = config_path('vendor'.DIRECTORY_SEPARATOR.'CrudAdminLte'.DIRECTORY_SEPARATOR.$filename['prefix'].'.php');
		$return = include $searchPath;
	return $return;
  }

  //---------------- openssl_get_cipher_methods

  public function _getUserGravatar() {

	$config  = config('vendor.CrudAdminLte.defaults.gravatar.defaults');
	// \_e::prex($config['enabled']);
	$systemPlaceholder = '/profile/default-250x250.jpg';
	// TODO: check for file exists
	$defaultPlacholder = $config['placeholder'];

	if ($config['enabled'] === 1) {
	  $emailHash  = md5( strtolower( trim( Auth::user()->email ) ) );
	  $protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
	  $url = $protocol.'://www.gravatar.com/avatar/';
	  $connected = @get_headers($url);
	  if ($connected[0] == 'HTTP/1.0 200 OK') {
		$image = $url.$emailHash.'?r=pg&s=250&d='.$config['gravatarplaceholder'];
	  } else {
		$image = url($defaultPlacholder);
	  };
	} else {
	  $image = url($defaultPlacholder);
	};
	// \_e::prex($image);

	return $image;
  }

  public function _getNotificationBuckets() {

	$config  = config('vendor.CrudAdminLte.defaults.notifications');
	$id = 'sysNotices';
	$return = '';
	// \_e::pre($config);
	if ($config['enabled'] === 1) {

	  if (!isset($config['pollinterval'])) {
		Session::forget('_sysScripts');
		return NULL;
	  }

	  $scriptx = [
		'interval' => $config['pollinterval']
	  ];

	  if (is_array($config['buckets']) && sizeof($config['buckets']) > 0) {
		foreach ($config['buckets'] as $options) {
		  if ( $options['ajaxurl'] !== '#' && $options['ajaxurl'] !== '' && $options['ajaxurl'] !== NULL ) {
			$scriptx['buckets'][] = [
			  'name'    => $options['name'],
			  // 'icon'    => $options['icon'],
			  // 'badge'   => $options['badge'],
			  // 'viewall' => $options['viewall'],
			  'url'     => action($options['ajaxurl'])
			];
			$return .= View::make('crudadminlte::admin._tmpl.partials.bucket', compact('options'));
		  };
		};
		// SCRIPT
		$script = [
		  'path'  => 'crudadminlte::crud.field.scripts.system_notifications',
		  'vars'  => [
			'id'  => $id,
			'defaults' => $scriptx
		  ]
		];
		// Session::put('_sysScripts', array_add($_script = Session::get('_scripts'), $id, $script));
	  };
	};

	// \_e::pre($scriptx);
	// return $return;

  }

}
