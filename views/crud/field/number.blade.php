<!--// a: NUMBER -->
  <input name="{!! $id !!}" type="number"
    @foreach ($attributes as $i=>$v)
      {!! $i.'="'.$v.'" ' !!}
    @endforeach
  value="{!! ($data!=NULL) ? $data : '' !!}">
<!--// z: NUMBER -->
