<!--// a: IPADDRESS -->
  <input name="{!! $id !!}" type="text" data-inputmask="'alias':'ip'" data-mask
    @foreach ($attributes as $i=>$v)
      {!! $i.'="'.$v.'" ' !!}
    @endforeach
  value="{!! ($data!=NULL) ? $data : '' !!}">
<!--// z: IPADDRESS -->
