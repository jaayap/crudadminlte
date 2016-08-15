
// DATE RANGE PICKER FIELD FOR "{!! $id !!}"
$('{!! '#'.$id.$unique !!}').daterangepicker({
  opens: '{!! $position !!}',
@if ($showtime == 1)
  timePicker: true,
  timePickerIncrement: 1,
  timePicker12Hour: {!! $show24 !!},
@endif
  format: '{!! $dateformat.' '.$timeformat !!}'
});
