<!--// a: TELEPHONE -->
  <input name="{!! $id !!}" type="tel"
  @if ($mask != '')
    data-inputmask="'mask':'{!! $mask !!}'" data-mask
  @endif
  @foreach ($attributes as $i=>$v)
    {!! $i.'="'.$v.'" ' !!}
  @endforeach
  value="{!! ($data!=NULL) ? $data : '' !!}">
  {!! $hint !!}
<!--// z: TELEPHONE -->
