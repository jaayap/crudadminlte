
// DUAL LIST FIELD FOR "{!! $id !!}"
$('#{!! $id !!}').bootstrapDualListbox(
@if (isset($defaults))
  {
@foreach ($defaults as $i=>$v)
    {!! $i !!}: '{!! $v !!}',
@endforeach
  }
@endif
);
