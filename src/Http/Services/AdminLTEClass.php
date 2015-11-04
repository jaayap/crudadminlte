<?php namespace Ivus\CrudAdminLte\Http\Services;

use Request, Route;

class AdminLTEClass {

  public $defaultIcon;

  public function __construct() {
    $defaultIcon = 'fa fa-circle-o';
		$this->defaultIcon = $defaultIcon;
	}

  function drawRoute() {
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

  function listLayout() {
    $filename = Route::getCurrentRoute()->getAction();
		$searchPath = config_path('vendor'.DIRECTORY_SEPARATOR.'CrudAdminLte'.DIRECTORY_SEPARATOR.$filename['prefix'].'.php');
		$return = include $searchPath;
    return $return;
  }

}
