<!--// a: COLOR PICKER -->
  <div class="input-group _colorpicker">
    <div class="input-group-addon"><i></i></div>
    <input name="{!! $id !!}" type="text"
      @foreach ($attributes as $i=>$v)
        {!! $i.'="'.$v.'" ' !!}
      @endforeach
    value="{!! ($data!=NULL) ? $data : '' !!}">
  </div>
<!--// z: COLOR PICKER -->
