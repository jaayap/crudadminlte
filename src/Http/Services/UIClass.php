<?php namespace Lab25\CrudAdminLte\Http\Services;

use Auth, Session, Request, Route, Form, View;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

use Input;

class UIClass {

  public function initAdmin($url = NULL) {

    // DEFAULTS
    $orderbyDef	= 'id';
    $dirDef			= 'asc';
    $perPageDef	= 10;

    // QUERIES
    $sessLoc  = $this->_getSession($url);
    $perPage  = Request::query('perPage');
    $orderby  = Request::query('order');

    // INITIALISE STYLE/SCRIPT STORE
    // Clear scripts session data on each page that is needed
    Session::forget('_scripts');

    // SET SEARCH OPTION
    $searchterm	= (isset($sessLoc->searchterm)) ? $sessLoc->searchterm : NULL;

    // SET FILTER OPTION
    $filterby		= (isset($sessLoc->filterby)) ? $sessLoc->filterby : NULL;

    // SET ORDER OPTION
    if ($orderby == NULL) {
      $orderby = (isset($sessLoc->orderby)) ? $sessLoc->orderby : $orderbyDef;
      $dir = (isset($sessLoc->dir)) ? $sessLoc->dir : $dirDef;
    }
    else {
      $reorder = explode(',',$orderby);
      $orderby = $reorder[0];
      $dir = $reorder[1];
    };

    // SET PAGER OPTION
    if ($perPage == NULL) {
      $perPage	= (isset($sessLoc->perpage)) ? $sessLoc->perpage : $perPageDef;
    }
    else if ($perPage == 'all') {
      $perPage	= 99999999999999;
    };

    // OUTPUT ARRAY
    $adminHlpr	= (object) [
      'searchterm' => $searchterm,
      'filterby' => $filterby,
      'orderby' => $orderby,
      'dir' => $dir,
      'pagination' => ['perPage' => $perPage]
    ];

    Session::put(Request::url(), (object) [
      'searchterm' => $searchterm,
      'filterby' => $filterby,
      'orderby' => $orderby,
      'dir' => $dir,
      'perpage' => $perPage
    ]);

    return $adminHlpr;

  }

  public function _getSession($url = NULL) {
    return ($url) ? Session::get($url) : Session::get(Request::url()) ;
	}

  public function _getSearchTerm() {
    $sessLoc	= $this->_getSession(Request::url());
    return e($sessLoc->searchterm);
  }

  public function _renderScripts($scripts) {
    // \_e::pre( $scripts );
    $return = '';
    if ( is_array($scripts) && sizeof($scripts) > 0 ) {
      $return .= '<script>'."\n";
      $return .= '$(function () {'."\n";
      $return .= "\n";
      foreach ($scripts as $js) {
        $return .= View::make($js['path'], $js['vars']);
        $return .= "\n";
      };
      $return .= '});'."\n";
      $return .= '</script>'."\n";
    };

    return $return;
  }

  public function _getUserGravatar() {

    // $default    = urlencode(url('/profile/suvi_thammasarn-250x250.jpg'));
    // $default  = '404';
    $default  = 'mm';
    // $default  = 'identicon';
    // $default  = 'monsterid';
    // $default  = 'wavatar';
    // $default  = 'retro';
    // $default  = 'blank';

    $emailHash  = md5( strtolower( trim( Auth::user()->email ) ) );
    return 'http://www.gravatar.com/avatar/'.$emailHash.'?r=pg&s=250&d='.$default;
  }

  //---------------- LISTINGS

  public function drawListViewHeader($data) {

    //\_e::prex($data);

    $_search = '';
    $_filter = '';

    $_s = count($data['searchable']);
    $_f = count($data['filterables']);

    $return = '<div class="box-header">';

    if ( $_s > 0 && $_f == 0 ) {
      $colWidths  = [4,8]; // 2 Columns
      $_search = $this->_drawSearch();
    } elseif ( $_s == 0 && $_f > 0 ) {
      $colWidths  = [10,2]; // 2 Columns
      $_filter = $this->_drawFilter($data['filterables']);
    } elseif ( $_s == 0 && $_f == 0 ) {
      $colWidths  = [12]; // FULL
    } else {
      $colWidths  = [4,6,2]; // 3 Columns
      $_search = $this->_drawSearch();
      $_filter = $this->_drawFilter($data['filterables']);
    };
    $_action = $this->_drawAction($data['actions'],$data['current']);

    $return .= '<div class="row">';
    switch (count($colWidths)) {
      case 3:
        $return .= '<div class="col-xs-'.$colWidths[0].'">'.$_search.'</div><!-- /.col -->';
        $return .= '<div class="col-xs-'.$colWidths[1].'">'.$_filter.'</div><!-- /.col -->';
        $return .= '<div class="col-xs-'.$colWidths[2].'">'.$_action.'</div><!-- /.col -->';
        break;
      case 2:
        $return .= '<div class="col-xs-'.$colWidths[0].'">';
        if ($_s > 0) $return .= $_search;
        if ($_f > 0) $return .= $_filter;
        $return .= '</div><!-- /.col -->';
        $return .= '<div class="col-xs-'.$colWidths[1].'">'.$_action.'</div><!-- /.col -->';
        break;
      default:
        $return .= '<div class="col-xs-'.$colWidths[0].'">'.$_action.'</div><!-- /.col -->';
        break;
    };
    $return .= '</div><!-- /.row -->';
    $return .= '</div><!-- /.box-header -->';

    return $return;

  }

    private function _drawSearch() {
      return View::make('crudadminlte::crud.list.searchbox')
              ->with('searchterm', $this->_getSearchTerm());
    }

    private function _drawFilter($_data) {
      $return = '<!-- / FILTERS BOX -->';

      foreach ($_data as $filter) {
      };

      $return .= Form::open(array('url'=>route('filter'), 'class'=>'navbar-form', 'role'=>'filter', 'style'=>'margin:0; padding:0;'));
      $return .= '<strong>Filter :</strong> ';

      $return .= '<select id="filter_status" class="form-control input-sm form-filterlist" role="filter" name="filter[status]">';
      $return .= '  <option value="-">All column</option>';
      $return .= '  <option value="--">--------------------</option>';
      $return .= '  <option value="NEW">NEW only</option>';
      $return .= '  <option value="PAID">PAID only</option>';
      $return .= '  <option value="REFUNDED">REFUNDED only</option>';
      $return .= '  <option value="all">All</option>';
      $return .= '</select> ';

      $return .= '<input type="text" class="form-control input-sm" id="reservationtime"> ';

      // RESET/SUBMIT BUTTON
      $return .= '<div class="input-group input-group-sm">';
      $return .= '  <input type="text" class="form-control input-sm" style="width:0; display:none;">';
      $return .= '  <span class="input-group-btn">';
      $return .= '    <a href="#" id="date-filter-reset" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove-circle"></i></a>';
      $return .= '    <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-filter"></span></button>';
      $return .= '  </span>';
      $return .= '</div>';

      $return .= Form::close();

      $return .= '<!-- / FILTERS BOX -->';
      return $return;
    }

    public function _drawAction($_data, $_cur) {
      $buttons = '';
      foreach ($_data as $action) {
        $buttons .= call_user_func('FormHelper::drawActionBtn', $action, NULL, $_cur);
      };
      return View::make('crudadminlte::crud.element.action', compact('buttons'));
    }

  public function drawDataTable($data) {

    $return = '';
    $return .= '<div class="box-body">';

    if ($data['total'] > 0) {
      $return .= '<table class="table table-bordered table-striped table-hover table-fixed-head">';

        // Draw table header
        $return .= $this->_drawTableHeader($data['list']);

        // Draw table body curl_multi_getcontent
        $return .= $this->_drawTableBody($data);

        // Draw table footer
        $return .= $this->_drawTableFooter($data['total'], ( count( $data['list'] ) + 1 ) );

      $return .= '</table>';
    } else {
      // $return .= '<div class="box box-solid"><div class="box-header with-border"><h3 class="box-title">'.\Lang::get('crud.general.noresults').'</h3></div><!-- /.box-header --></div>';
      $return .= '<div class="box box-solid"><div class="box-header with-border"><h3 class="box-title">'.trans('crudadminlte::crud.general.noresults').'</h3></div><!-- /.box-header --></div>';
    };

    $return .= '</div><!-- /.box-body -->';

    return $return;

  }

    private function _drawTableHeader($_data) {
      $_var	= $this->_getSession();
      $chev=$_dir=$_ico='';

      $return = '';
      $return .= '<thead>';
      $return .= '<tr>';
      foreach ($_data as $_kID=>$_field) {
        if ($_kID != 'actions') {
          $return .= '<th>';
          if (isset($_field['sortable']) && $_field['sortable'] == 1) {
            if ($_kID === '_activate') {
              $_kID = 'active';
            };
            $carat = 'angle';
            if ($_var->orderby == $_kID) {
      				 if ($_var->dir == 'asc') {
      					 $_dir	= 'desc';
      					 $_ico = 'fa-'.$carat.'-down';
      				 } else {
      					 $_dir	= 'asc';
                 $_ico = 'fa-'.$carat.'-up';
      				 };
      				 $chev	= '<i class="fa '.$_ico.' pull-right" style="margin-top:3px;"></i> ';
      			} else {
      				$chev	= '';
      				$_dir	= $_var->dir;
      			};
            if ($_kID === '_activate') {
              $return .= '<a href="'.url(Request::url().'/?order='.$_field['column'].','.$_dir).'">';
            } else {
              $return .= '<a href="'.url(Request::url().'/?order='.$_kID.','.$_dir).'">';
            };
            $return .= $_field['label'];
            $return .= $chev;
            $return .= '</a>';
          } else {
            $return .= ''. $_field['label'] .'';
          };
          $return .= '</th>';
        };
      };
      $return .= '<th width="1">Actions</th>';
      $return .= '</tr>';
      $return .= '</thead>';
      return $return;
    }

    private function _drawTableBody($_data) {
      $return = '';
      $return .= '<tbody>';
      foreach ($_data['data'] as $d) {
        $return .= '<tr>';
        foreach ($_data['list'] as $_k=>$_v) {
          if ($_k == 'actions') {
            $return .= '<td nowrap>';
            foreach ($_data['list']['actions'] as $_a=>$action) {
              $return .= call_user_func('FormHelper::drawActionBtn', $action, $d, $_data['current']);
            };
            $return .= '</td>';
          } elseif ($_k == '_activate') {
            $return .= '<td width="70" nowrap align="center">';
            $return .= call_user_func('FormHelper::drawActiveBtn', $_v, $d, $_data['current']);
            $return .= '</td>';
          } else {
            $return .= '<td>';
            if (isset($_v['format'])) {
              $return .= call_user_func('SiteHelper::'.$_v['format'], $d->$_k);
            } else {
              $return .= $d->$_k;
            };
            $return .= '</td>';
          };
        }
        $return .= '</tr>';
      };
      $return .= '</tbody>';
      return $return;
    }

    private function _drawTableFooter($_data,$cols) {
      $return = '';
      if ($_data > 0) {
        $return .= '<tfoot>';
        $return .= '<tr>';
        $return .= '<th colspan="'.$cols.'">Total : '.$_data.' records</th>';
        $return .= '</tr>';
        $return .= '</tfoot>';
      };
      return $return;
    }

  //---------------- FORMS

  public function drawForm($type, $conf, $data, $errors) {

    $return = '';
    $hasTabs = 0;
    foreach ($conf as $i=>$v) {
      // check if this is a TAB
      if (is_numeric($i)) $hasTabs = 1;
    };
    if ($hasTabs == 1) {
      // define TAB container
      $return .= '<div class="nav-tabs-custom">';
        // define TAB navigation
        $return .= $this->_setUpTabNav($conf);
        // define TAB content
        $return .= $this->_setUpTabContent($type, $conf, $data, $errors);
      $return .= '</div><!-- /.nav-tabs-custom -->';
    } else {
      // NORMAL VIEW
      $return .= '<div class="nav-tabs-custom">';
        $return .= '<div class="tab-content">';
          $return .= '<div class="box-body">';
            $return .= $this->_setUpFieldGroups($type, $conf['fields'], $data, $errors);
          $return .= '</div><!-- /.box-body -->';
        $return .= '</div><!-- /.tab-content -->';
      $return .= '</div><!-- /.nav-tabs-custom -->';
    };
    return $return;
  }

    private function _setUpTabNav($conf) {
      $return = '';
      $return .= '<ul class="nav nav-tabs">';
      $x = 1;
      foreach ($conf as $tab) {
        foreach ($tab as $i=>$v) {
          if ($i == 'tab') {
            $return .= '<li class="'.(($x==1) ? 'active' : '').'"><a href="#tab_'.$x.'" data-toggle="tab">'.$v.'</a></li>';
            $x++;
          };
        };
      };
      $return .= '</ul>';
      return $return;
    }

    private function _setUpTabContent($type, $conf, $data, $errors) {
      $return = '';
      $return .= '<div class="tab-content">';
      $x = 1;
      foreach ($conf as $tab) {
        foreach ($tab as $i=>$v) {
          if ($i == 'tab') {
            $return .= '<div class="tab-pane '.(($x==1) ? 'active' : '').'" id="tab_'.$x.'">';
  					$return .= '<div class="box-body">';
              $return .= $this->_setUpFieldGroups($type, $tab['fields'], $data, $errors);
            $return .= '</div><!-- /.box-body -->';
  					$return .= '</div><!-- /.tab-pane -->';
            $x++;
          };
        };
      };
      $return .= '</div><!-- /.tab-content -->';
      return $return;
    }

    private function _setUpFieldGroups($type, $fields, $data, $errors) {
      $return = '';
      $isGrouped = 0;
      foreach ($fields as $i=>$v) {
        // check if this is a FIELDSET
        if (is_numeric($i)) {
          // FIELDSET
          if (!is_array($v) && strtolower($v) === 'break') {
            $return .= '<hr/>';
          } else {
            foreach ($v as $_v) {
              $return .= '<fieldset>';
              foreach ($_v as $id=>$field) {
                $return .= $this->_setUpField($id, $this->_getConfigType($type, $field), $data[$id], $errors);
              };
              $return .= '</fieldset>';
            };
          };
        } else {
          // NORMAL
          $return .= $this->_setUpField($i, $this->_getConfigType($type, $v), $data[$i], $errors);
        };
      };
      return $return;
    }

    private function _getConfigType($type, $field) {
      $isMulti = 0;
      if (is_array($field)) {
        foreach ($field as $a=>$b) {
          // check if this is a MULTI CONFIG FIELD
          if (is_numeric($a)) $isMulti = 1;
        };
      };
      if ($isMulti == 1) {
        if ($type == 'NEW') {
          return $field[0];
        } else { // EDIT
          return $field[1];
        };
      } else {
        return $field;
      };
    }

    private function _setUpField($id, $field, $data, $errors) {
      $return = '';
      if ($field['type'] != 'SKIP' && $field['type'] != 'HIDDEN') {
        $return .= '<div class="row form-group ';
        if ($errors->has($id)) {
          $return .= 'has-error';
        };
        $return .= '" id="frmGrpRow_'.$id.'">';
        $return .= '  <div class="col-sm-2" id="frmGrpColLabel_'.$id.'">';
        $return .= '    <label id="frmLabel_'.$id.'" for="'.$id.'">'.$field['label'].'</label>';
        $return .= '  </div><!-- /.col -->';
        $return .= '  <div class="col-sm-10" id="frmGrpColField_'.$id.'">';

        if ($errors->has($id)) {
          $return .= '<small class="bg-red-active error_small">'.$errors->first($id).'</small><br/>';
        };

        // generate field from TYPE
        $return .= call_user_func('FormHelper::drawField', $id, $field, $data);

        $return .= '  </div><!-- /.col -->';
        $return .= '</div><!-- /.row -->';
      };
      if ($field['type'] == 'HIDDEN') {
        $return = call_user_func('FormHelper::drawField', $id, $field, $data);
      };
      return $return;
    }

  //---------------- VALIDATION

  public function getValidation($type='NEW', $id=NULL) {
    $conf = \aLTE::listLayout();
    foreach ($conf['form'] as $a=>$fields) {
      // check if this is a TAB
      if (is_numeric($a)) {
        // HAS TABS
        foreach ($fields as $b=>$field) {
          if ($b == 'fields') {
            $return = $this->__iterateValidationFields($field, $type, $id);
          };
        };
      } else {
        $return = $this->__iterateValidationFields($fields, $type, $id);
      };
    };

    return $this->__formatValidation(array_filter($return));
  }

    private function __iterateValidationFields($fields, $type, $id=NULL) {
      $return = array();
      foreach ($fields as $n=>$v) {
        // check if this is a FIELDSET
        if (is_numeric($n)) {
          // FIELDSET
          if (is_array($v)) {
            foreach ($v as $_v) {
              foreach ($_v as $name=>$field) {
                $validation = $this->__setValidationField($this->_getConfigType($type, $field), $name, $id);
                if (isset($validation)) { $return[$name] = $validation; };
              };
            };
          };
        } else {
          // NORMAL
          $validation = $this->__setValidationField($this->_getConfigType($type, $v), $n, $id);
          if (isset($validation)) { $return[$n] = $validation; };
        };
      };
      return $return;
    }

    private function __setValidationField($field, $input, $id=NULL) {
      if (isset($field['validation']) && $field['validation'] != '') {
        $return = array();
        if (is_numeric(strrpos( strtolower($field['validation']),'onexists'))) {
          if ( Input::get($input) == "" || Input::get($input) === NULL) {
            return $return;
          } else {
            $field['validation'] = str_replace('onExists|','', str_replace('onexists|','', $field['validation']) );
          };
        };
        $return['validation'] = $field['validation'];
        if (is_numeric(strrpos( $field['validation'],'unique:'))) {
          if (is_numeric(strrpos( $field['validation'],'$id'))) {
            $return['validation'] = str_replace('$id',$id,$field['validation']);
          };
        };
        if (count($field['errormessage']) > 0) {
          $return['message'] = $field['errormessage'];
        };
        return $return;
      };
      return NULL;
    }

    private function __formatValidation($data) {
      $v = array();
      $m = array();
      foreach ($data as $id=>$_data) {
        $v[$id] = $_data['validation'];
        if (isset($_data['message'])) {
          foreach ($_data['message'] as $i=>$msg) {
            $m[$id.'.'.$i] = $msg;
          };
        };
      };
      return array('validation'=>$v,'messages'=>$m);
    }

}
