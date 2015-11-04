<!--// a: CODEBLOCK -->
  <div class="codeEditorNav">
    {!! $modes !!}
    <a nohref id="{!! 'showInvisibles_'.$id !!}" class="btn btn-default btn-flat btn-sm" style="margin-bottom:5px;display:inline;" alt="Toggle Invisibles" title="Toggle Invisibles">
      <span class="fa fa-paragraph"></span>
    </a>
    <a nohref id="{!! 'showIndents_'.$id !!}" class="btn btn-default btn-flat btn-sm" style="margin-bottom:5px;display:inline;" alt="Toggle Indents" title="Toggle Indents">
      <span class="fa fa-ellipsis-v"></span>
    </a>
  </div>
  <div id="{!! '_ed_'.$id !!}" class="codeEditor" {!! $style !!} >{!! $data !!}</div>
  {!! \Form::hidden($id, $data, array('id'=>$id)) !!}
<!--// z: CODEBLOCK -->
