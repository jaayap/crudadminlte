<!--// a: CHECKBOX -->
  <label for="{!! $label['id'] !!}" style="font-weight:normal;">
    {!! Form::hidden($id, 0) !!}
    {!! \Form::checkbox($id, $index, $data, $attributes) !!} &nbsp;{!! $label['text'] !!}
  </label>
<!--// z: CHECKBOX -->
