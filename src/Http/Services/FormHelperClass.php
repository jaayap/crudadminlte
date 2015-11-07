<?php namespace Lab25\CrudAdminLte\Http\Services;

use Request, Route, View, Session;

class FormHelperClass {

  var $default_style = 'form-control input';

  public function drawActionBtn($action, $data=NULL, $control) {
      $_con   = explode('@',$control['controller']);
      $link   = action('\\'.$_con[0].'@'.(strtolower($action['type'])), ( (isset($data) && $data->id != NULL ) ? $data->id : NULL ));
      $label  = (isset($action['label']) && $action['label'] !='') ? $action['label']  : trans('crudadminlte::crud.buttons.'.$action['type'].'.label') ;
      $icon   = (isset($action['icon']) && $action['label'] !='')  ? $action['icon']   : trans('crudadminlte::crud.buttons.'.$action['type'].'.icon') ;
      $color  = (isset($action['color']) && $action['label'] !='') ? $action['color']  : trans('crudadminlte::crud.buttons.'.$action['type'].'.color') ;
      $compact  = (isset($action['compact']) && $action['compact'] == 1) ? 1 : 0;
      return View::make('crudadminlte::crud.element.button', compact('link', 'label', 'icon', 'color', 'compact'));
    }

  public function drawActiveBtn($action, $data=NULL, $control) {
    $_con   = explode('@',$control['controller']);
    $link   = action('\\'.$_con[0].'@publish', ( (isset($data) && $data->id != NULL ) ? $data->id : NULL ));
    $label  = (isset($action['label'])) ? $action['label']  : trans('crudadminlte::crud.buttons.'.$action['type'].'.label') ;
    if ($data->$action['column'] == 1) {
      $icon   = trans('crudadminlte::crud.buttons.PUBLISH.active.icon') ;
      $color  = trans('crudadminlte::crud.buttons.PUBLISH.active.color') ;
    } else {
      $icon   = trans('crudadminlte::crud.buttons.PUBLISH.inactive.icon') ;
      $color  = trans('crudadminlte::crud.buttons.PUBLISH.inactive.color') ;
    };
    $compact  = 1;
    return View::make('crudadminlte::crud.element.button', compact('link', 'label', 'icon', 'color', 'compact'));
  }

  public function drawField($id, $field, $data=NULL) {
    return call_user_func( array( $this, '_'.camel_case('field'.strtolower($field['type'])) ), $id, $field, $data);
  }

    private function _fieldInfo($id, $field, $data=NULL) {
      if (isset($field['format']) && $field['format'] != '') {
        $data = call_user_func(array('\SiteHelper', $field['format']), $data);
      };
      return View::make('crudadminlte::crud.field.info')
              ->with('id', $id)
              ->with('class', $this->default_style)
              ->with('data', $data);
    }

    private function _fieldText($id, $field, $data=NULL) {
      $attributes = array('id' => $id);
      $attributes['class'] = $this->default_style.' '.( ($field['class']) ? $field['class'] : '' );
      if (isset($field['options'])) {
        foreach ($field['options'] as $i=>$v) {
          $attributes[$i] = $v;
        };
      };
      return View::make('crudadminlte::crud.field.text', compact('id', 'data', 'attributes'));
    }

    private function _fieldTextArea($id, $field, $data=NULL) {
      $attributes = array('id' => $id);
      $attributes['class'] = $this->default_style.' '.( ($field['class']) ? $field['class'] : '' );
      if (isset($field['options'])) {
        foreach ($field['options'] as $i=>$v) {
          $attributes[$i] = $v;
        };
      };
      return View::make('crudadminlte::crud.field.textarea', compact('id', 'data', 'attributes'));
    }

    private function _fieldEmail($id, $field, $data=NULL) {
      $attributes = array('id' => $id);
      $attributes['class'] = $this->default_style.' '.( ($field['class']) ? $field['class'] : '' );
      if (isset($field['options'])) {
        foreach ($field['options'] as $i=>$v) {
          $attributes[$i] = $v;
        };
      };
      return View::make('crudadminlte::crud.field.email', compact('id', 'data', 'attributes'));
    }

    private function _fieldPassword($id, $field, $data=NULL) {
      $attributes = array('id' => $id);
      $attributes['class'] = $this->default_style.' '.( ($field['class']) ? $field['class'] : '' );
      if (isset($field['options'])) {
        foreach ($field['options'] as $i=>$v) {
          $attributes[$i] = $v;
        };
      };
      return View::make('crudadminlte::crud.field.password', compact('id', 'attributes'));
    }

    private function _fieldNumber($id, $field, $data=NULL) {
      $attributes = array('id' => $id);
      $attributes['class'] = $this->default_style.' '.( ($field['class']) ? $field['class'] : '' );
      if (isset($field['options'])) {
        foreach ($field['options'] as $i=>$v) {
          $attributes[$i] = $v;
        };
      };
      return View::make('crudadminlte::crud.field.number', compact('id', 'data', 'attributes'));
    }

    private function _fieldTelephone($id, $field, $data=NULL) {
      $mask = '';
      $hint = '';
      $attributes = array('id' => $id);
      $attributes['class'] = $this->default_style.' '.( ($field['class']) ? $field['class'] : '' );
      if (isset($field['options'])) {
        foreach ($field['options'] as $i=>$v) {
          $attributes[$i] = $v;
        };
      };
      if (isset($field['mask']) && $field['mask'] != '') {
        if (isset($attributes['style'])) {
          $attributes['style'] = $attributes['style'].'; display:inline-block;';
        } else {
          $attributes['style'] = 'display:inline-block;';
        };
        $placeholderTxt = str_replace('9','8',$field['mask']);
        $attributes['placeholder'] = $placeholderTxt;
        $mask = $field['mask'];
        $hint = ' <small><strong>Format : </strong> <em>'.$placeholderTxt.'</em></small>';
      };
      return View::make('crudadminlte::crud.field.telephone', compact('id', 'data', 'attributes', 'mask', 'hint'));
    }

    private function _fieldIPAddress($id, $field, $data=NULL) {
      $attributes = array('id' => $id);
      $attributes['class'] = $this->default_style.' '.( ($field['class']) ? $field['class'] : '' );
      if (isset($field['options'])) {
        foreach ($field['options'] as $i=>$v) {
          $attributes[$i] = $v;
        };
      };
      return View::make('crudadminlte::crud.field.ipaddress', compact('id', 'data', 'attributes'));
    }

    private function _fieldHidden($id, $field, $data=NULL) {
      $attributes = array('id' => $id);
      return View::make('crudadminlte::crud.field.hidden', compact('id', 'data', 'attributes'));
    }

    private function _fieldFile($id, $field, $data=NULL) {
      $attributes = array('id' => $id);
      $attributes['class'] = ' _filestyle '.( ($field['class']) ? '' : '' );
      if (isset($field['options'])) {
        foreach ($field['options'] as $i=>$v) {
          if ($i == 'placeholder') {
            $attributes['data-placeholder'] = $v;
          };
          $attributes[$i] = $v;
        };
      };
      return View::make('crudadminlte::crud.field.file', compact('id', 'data', 'attributes'));
    }

    private function _fieldSelect($id, $field, $data=NULL) {
      $_err = '<strong style="color:red;">LIST OPTIONS MISSING OR INCORRECT</strong>';
      if (!isset($field['list'])) {
        return $_err;
      } else {
        if (!is_array($field['list'])) { // check for model
          $_m = explode(':',$field['list']);
          if ($_m[0] == 'model' && $_m[1] != '') {
            $_model = 'App\\'.$_m[1];
            $field['list'] = $_model::selectList();
          } else {
            return $_err;
          };
        };
      };
      $attributes = array('id' => $id);
      $attributes['class'] = $this->default_style
        .' '.
        ((isset($field['typeahead']) && $field['typeahead'] != '' && $field['typeahead']) ? 'select2' : '' )
        .' '
        .( ($field['class']) ? $field['class'] : '' );
      if (!isset($field['options']['multiple'])) {
        if (isset($field['options']['placeholder']) && $field['options']['placeholder'] != '') {
          array_unshift($field['list'], $field['options']['placeholder']);
          array_forget($field, 'options.size');
        };
      } else {
        if (isset($field['typeahead']) && $field['typeahead'] != '' && $field['typeahead']) {
          array_forget($field, 'options.readonly');
        };
        $id = $id.'[]';
      };
      if (isset($field['options'])) {
        foreach ($field['options'] as $i=>$v) {
          $attributes[$i] = $v;
        };
      };
      return View::make('crudadminlte::crud.field.select')
              ->with('id', $id)
              ->with('options', $field['list'])
              ->with('data', $data)
              ->with('attributes', $attributes);
    }

    private function _fieldSelectRange($id, $field, $data=NULL) {
      if (!isset($field['range']) || !is_array($field['range']) || (count($field['range']) != 2)) {
        return '<strong style="color:red;">RANGE ARGUMENT MISSING OR INCORRECT</strong>';
      };
      $attributes = array('id' => $id);
      $attributes['class'] = $this->default_style.' select2 '.( ($field['class']) ? $field['class'] : '' );
      if (isset($field['options'])) {
        foreach ($field['options'] as $i=>$v) {
          $attributes[$i] = $v;
        };
      };
      return self::__selectRange($id, $field['range'][0], $field['range'][1], $data, $attributes);
    }

      private function __selectRange($id, $begin, $end, $data = null, $attributes = array()) {
    		$options = array_combine($options = range($begin, $end), $options);
        $options[0] = '- Select -';
        asort($options);
        return View::make('crudadminlte::crud.field.select', compact('id', 'options', 'data', 'attributes'));
    	}

    private function _fieldSelectMonth($id, $field, $data=NULL) {
      $attributes = array('id' => $id);
      $attributes['class'] = $this->default_style.' select2 '.( ($field['class']) ? $field['class'] : '' );
      if (isset($field['options'])) {
        foreach ($field['options'] as $i=>$v) {
          $attributes[$i] = $v;
        };
      };
      return self::__selectMonth($id, $data, $attributes);
    }

      private function __selectMonth($id, $data = null, $attributes = array(), $format = '%B') {
    		$options = array();
        $options[0] = '- Select -';
    		foreach (range(1, 12) as $month) {
    			$options[$month] = strftime($format, mktime(0, 0, 0, $month, 1));
    		}
        return View::make('crudadminlte::crud.field.select', compact('id', 'options', 'data', 'attributes'));
    	}

    private function _fieldCheckBox($id, $field, $data=NULL) {
      $attributes = array('class' => '_icheck');
      if (isset($field['options'])) {
        foreach ($field['options'] as $i=>$v) {
          $attributes[$i] = $v;
        };
      };
      if (!isset($field['list'])) {
        return '<strong style="color:red;">OPTIONS MISSING OR INCORRECT</strong>';
      } else {
        if (!is_array($field['list'])) { // check for model
          $_m = explode(':',$field['list']);
          if ($_m[0] == 'model' && $_m[1] != '') {
            $_model = 'App\\'.$_m[1];
            $field['list'] = $_model::selectList();
          };
        };
      };
      $return = '';
      if (count($field['list'] ) > 1) {
        $x = 0;
        foreach ($field['list'] as $i=>$v) {
          $attributes['id'] = $id.'_'.$x;
          $return .= View::make('crudadminlte::crud.field.checkbox')
                      ->with('id', $id)
                      ->with('index', $i)
                      ->with('label', [
                        'id'    => $id.'_'.$x,
                        'text'  => $v
                      ])
                      ->with('data', ($data != '' || $data != null) ? 1 : 0)
                      ->with('attributes', $attributes);
          $x++;
        };
      } else {
        foreach ($field['list'] as $i=>$v) {
          $attributes['id'] = $id;
          return View::make('crudadminlte::crud.field.checkbox')
                  ->with('id', $id)
                  ->with('index', $i)
                  ->with('label', [
                    'id'    => $id,
                    'text'  => $v
                  ])
                  ->with('data', ($data != '' || $data != null) ? 1 : 0)
                  ->with('attributes', $attributes);
        };
      };
      return $return;
    }

    private function _fieldRadio($id, $field, $data=NULL) {
      $attributes = array('class' => '_icheck');
      if (isset($field['options'])) {
        foreach ($field['options'] as $i=>$v) {
          $attributes[$i] = $v;
        };
      };
      if (!isset($field['list'])) {
        return '<strong style="color:red;">OPTIONS MISSING OR INCORRECT</strong>';
      } else {
        if (!is_array($field['list'])) { // check for model
          $_m = explode(':',$field['list']);
          if ($_m[0] == 'model' && $_m[1] != '') {
            $_model = 'App\\'.$_m[1];
            $field['list'] = $_model::selectList();
          };
        };
      };
      $return = '';
      if (count($field['list'] ) > 1) {
        $x = 0;
        foreach ($field['list'] as $i=>$v) {
          $attributes['id'] = $id.'_'.$x;
          $return .= View::make('crudadminlte::crud.field.radio')
                      ->with('id', $id)
                      ->with('index', $i)
                      ->with('label', [
                        'id'    => $id.'_'.$x,
                        'text'  => $v
                      ])
                      ->with('data', ($data != '' || $data != null) ? 1 : 0)
                      ->with('attributes', $attributes);
          $x++;
        };
      } else {
        foreach ($field['list'] as $i=>$v) {
          $attributes['id'] = $id;
          return View::make('crudadminlte::crud.field.radio')
                  ->with('id', $id)
                  ->with('index', $i)
                  ->with('label', [
                    'id'    => $id,
                    'text'  => $v
                  ])
                  ->with('data', ($data != '' || $data != null) ? 1 : 0)
                  ->with('attributes', $attributes);
        };
      };
      return $return;
    }

    private function _fieldDate($id, $field, $data=NULL) {
      $mask = '';
      $hint = '';
      $attributes = array('id' => $id);
      $attributes['class'] = $this->default_style.' '.( ($field['class']) ? $field['class'] : '' );
      if (isset($field['options'])) {
        foreach ($field['options'] as $i=>$v) {
          $attributes[$i] = $v;
        };
      };
      if (isset($field['format']) && $field['format'] != '') {
        if (isset($attributes['style'])) {
          $attributes['style'] = $attributes['style'].'; display:inline-block;';
        } else {
          $attributes['style'] = 'display:inline-block;';
        };
        $placeholderTxt = $field['format'];
        $attributes['placeholder'] = $placeholderTxt;
        $mask = $field['format'];
        $hint = ' <small><strong>Format : </strong> <em>'.$placeholderTxt.'</em></small>';
      };
      return View::make('crudadminlte::crud.field.date', compact('id', 'data', 'attributes', 'mask', 'hint'));
    }

    private function _fieldTime($id, $field, $data=NULL) {
      $attributes = array('id' => $id);
      $attributes['class'] = $this->default_style.' timepicker '.( ($field['class']) ? $field['class'] : '' );
      if (isset($field['showseconds']) && $field['showseconds'] == true) {
        $attributes['data-show-seconds'] = 'true';
      };
      if (isset($field['format']) && strtolower($field['format']) == '24hr') {
        $attributes['data-show-meridian'] = 'false';
      };
      if (isset($field['options'])) {
        foreach ($field['options'] as $i=>$v) {
          $attributes[$i] = $v;
        };
      };
      return View::make('crudadminlte::crud.field.text', compact('id', 'data', 'attributes'));
    }

    private function _fieldColour($id, $field, $data=NULL) {
      $attributes = array('id'=>$id, 'maxlength'=>50, 'style'=>'width:250px;');
      $attributes['class'] = $this->default_style.' '.( ($field['class']) ? $field['class'] : '' );
      if (isset($field['options'])) {
        foreach ($field['options'] as $i=>$v) {
          if ($i == 'style') $v = $v.';width:250px !important;';
          $attributes[$i] = $v;
        };
      };
      return View::make('crudadminlte::crud.field.color', compact('id', 'data', 'attributes'));
    }

    // ADVANCED

    private function _fieldWYSiWYG($id, $field, $data=NULL) {
      // SCRIPT
      $script = [
        'path'  => 'crudadminlte::crud.field.scripts.wysiwyg',
        'vars'  => [
          'id'  => $id
        ]
      ];
      Session::flash('_scripts', array_add($_script = Session::get('_scripts'), $id, $script));
      // VIEW
      $attributes = NULL;
      return View::make('crudadminlte::crud.field.textarea', compact('id', 'data', 'attributes'));
    }

    private function _fieldCodeBlock($id, $field, $data=NULL) {
      // SCRIPT
      $editorName = '_e'.str_random(40);
      $script = [
        'path'  => 'crudadminlte::crud.field.scripts.codeblock',
        'vars'  => [
          'id'  => $id,
          'editorName' => $editorName,
          'language' => isset($field['lang']) ? $field['lang'] : '',
          'readonly' => isset($field['options']['readonly']) ? $field['options']['readonly'] : ''
        ]
      ];
      Session::flash('_scripts', array_add($_script = Session::get('_scripts'), $id, $script));
      // VIEW
      $modesList  = config('vendor.CrudAdminLte.defaults.aceeditor.modes');
      $langauge   = (isset($field['lang']) && $field['lang'] != '') ? strtolower($field['lang']) : NULL;
      $attributes = [
        'id' => $id.'_mode',
        'class' => $this->default_style.' select2',
        'style' => 'width:150px;margin-bottom:5px;display:inline;'
      ];
      $modes = \Form::select($id.'_mode', $modesList, $langauge, $attributes);
      $style = (isset($field['options']['style']) && $field['options']['style'] != '') ? 'style="'.$field['options']['style'].'"' : '' ;
      return View::make('crudadminlte::crud.field.codeblock')
              ->with('id', $id)
              ->with('modes', $modes)
              ->with('style', $style)
              ->with('data', $data);
    }

    private function _fieldTextLimit($id, $field, $data=NULL) {
      $limit  = (isset($field['limit'])) ? $field['limit'] : 0;
      // SCRIPT
      $editorName = '_e'.str_random(40);
      $script = [
        'path'  => 'crudadminlte::crud.field.scripts.textlimit',
        'vars'  => [
          'id'  => $id,
          'limit' => $limit,
        ]
      ];
      Session::flash('_scripts', array_add($_script = Session::get('_scripts'), $id, $script));
      // VIEW
      $attributes = array('id' => $id);
      $attributes['class'] = $this->default_style.' '.( ($field['class']) ? $field['class'] : '' );
      if (isset($field['options'])) {
        foreach ($field['options'] as $i=>$v) {
          $attributes[$i] = $v;
        };
      };
      $rows   = (isset($field['options']['rows'])) ? strtolower($field['options']['rows']) : 0;
      return View::make('crudadminlte::crud.field.textlimit', compact('id', 'data', 'rows', 'limit', 'attributes'));
    }

    private function _fieldDateRange($id, $field, $data=NULL) {
      $unique = '_DR_'.str_random(40);
      // SCRIPT
      if (isset($field['timeformat']) && strtolower($field['timeformat']) == '24hr') {
        $show24 = 1;
        $timeFormat = 'HH:mm:ss';
      } else {
        $show24 = 0;
        $timeFormat = 'hh:mm:ss A';
      };
      $script = [
        'path'  => 'crudadminlte::crud.field.scripts.daterange',
        'vars'  => [
          'id'  => $id,
          'unique'  => $unique,
          'position' => (isset($field['position']) && strtoupper($field['position']) == 'LEFT') ? 'left' : 'right',
          'dateformat' => (isset($field['dateformat']) && $field['dateformat'] != '') ? strtoupper($field['dateformat']) : 'DD/MM/YYYY',
          'timeformat' => $timeFormat,
          'showtime' => (isset($field['showtime']) && $field['showtime'] == TRUE) ? 1 : 0,
          'show24' => $show24
        ]
      ];
      Session::flash('_scripts', array_add($_script = Session::get('_scripts'), $id, $script));
      // VIEW
      $attributes = array('id' => $id.$unique);
      $attributes['class'] = $this->default_style.' _daterangepicker '.( ($field['class']) ? $field['class'] : '' );
      if (isset($field['options'])) {
        foreach ($field['options'] as $i=>$v) {
          $attributes[$i] = $v;
        };
      };
      return View::make('crudadminlte::crud.field.text', compact('id', 'data', 'attributes'));
    }

    private function _fieldtoggle($id, $field, $data=NULL) {
      $attributes = array('class' => 'make-switch');
      if (isset($field['options'])) {
        foreach ($field['options'] as $i=>$v) {
          $attributes[$i] = $v;
        };
      };
      if (!isset($field['list']) || !isset($field['defaults']['type'])) {
        return '<strong style="color:red;">OPTIONS MISSING OR INCORRECT</strong>';
      }
      else {
        if (!is_array($field['list'])) { // check for model
          $_m = explode(':',$field['list']);
          if ($_m[0] == 'model' && $_m[1] != '') {
            $_model = 'App\\'.$_m[1];
            $field['list'] = $_model::selectList();
          };
        };
      };
      // SCRIPT
      $script = [
        'path'  => 'crudadminlte::crud.field.scripts.toggle',
        'vars'  => [
          'id'  => $id,
          'defaults' => $field['defaults']
        ]
      ];
      Session::flash('_scripts', array_add($_script = Session::get('_scripts'), $id, $script));
      // VIEW
      $return = '';
      $x = 0;
      if (sizeof($field['list']) > 1) {
        $return .= '<div class="control-group"><div class="controls">';
      };
      foreach ($field['list'] as $i=>$v) {
        if (count($field['list'] ) > 1) {
          $_id = $id.'_'.$x;
          $name = ($field['defaults']['type'] === 'RADIO') ? $id : $id.'[]';
        }
        else {
          $_id = $id;
          $name = $id;
        };
        $attributes['id'] = $_id;
        $return .= View::make('crudadminlte::crud.field.toggle')
                    ->with('name', $name)
                    ->with('index', $i)
                    ->with('label', [
                      'id'    => $_id,
                      'text'  => $v
                    ])
                    ->with('type', strtolower($field['defaults']['type']))
                    ->with('data', ($data != '' || $data != null) ? 1 : 0)
                    ->with('attributes', $attributes);
        $x++;
      };
      if (sizeof($field['list']) > 1) {
        $return .= '</div></div>';
      };
      return $return;
    }

    private function _fieldduallist($id, $field, $data=NULL) {
      $attributes = array('class' => '');
      if (isset($field['options'])) {
        foreach ($field['options'] as $i=>$v) {
          $attributes[$i] = $v;
        };
      };
      if (!isset($field['list'])) {
        return '<strong style="color:red;">OPTIONS MISSING OR INCORRECT</strong>';
      }
      else {
        if (!is_array($field['list'])) { // check for model
          $_m = explode(':',$field['list']);
          if ($_m[0] == 'model' && $_m[1] != '') {
            $_model = 'App\\'.$_m[1];
            $field['list'] = $_model::selectList();
          };
        };
      };
      // SCRIPT
      $script = [
        'path'  => 'crudadminlte::crud.field.scripts.duallist',
        'vars'  => [
          'id'  => $id,
          'defaults' => $field['defaults']
        ]
      ];
      Session::flash('_scripts', array_add($_script = Session::get('_scripts'), $id, $script));
      // VIEW
      $attributes = array(
        'id' => $id,
        'name' => $id.'[]',
        'multiple' => 'multiple'
      );
      return View::make('crudadminlte::crud.field.select')
              ->with('id', $id)
              ->with('options', $field['list'])
              ->with('data', $data)
              ->with('attributes', $attributes);
    }

}
