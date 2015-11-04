<!--// a: DATE -->
  <input name="{!! $id !!}" type="text"
  @if ($mask != '')
    data-inputmask="'alias':'{!! $mask !!}'" data-mask
  @endif
  @foreach ($attributes as $i=>$v)
    {!! $i.'="'.$v.'" ' !!}
  @endforeach
  value="{!! ($data!=NULL) ? $data : '' !!}">
  {!! $hint !!}
<!--// z: DATE -->
