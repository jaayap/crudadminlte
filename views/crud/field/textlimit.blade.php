<!--// a: TEXTLIMIT -->
@if ($rows > 0)
  {!! \Form::textarea($id, $data, $attributes) !!}
@else
  {!! \Form::text($id, $data, $attributes) !!}
@endif
@if ($limit > 0)
  <span id="{!! 'charLimit_'.$id !!}"><strong>?</strong> <small>characters remaining.</small></span>
@else
  <span id="{!! 'charLimit_'.$id !!}"><small>"maxlength" not defined.</small></span>
@endif
<!--// z: TEXTLIMIT -->
