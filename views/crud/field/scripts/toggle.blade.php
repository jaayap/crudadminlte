
// TOGGLE FIELD FOR "{!! $id !!}"
// Sets a small switch
$.fn.bootstrapSwitch.defaults.size = 'small';
$.fn.bootstrapSwitch.defaults.animate = true;
$.fn.bootstrapSwitch.defaults.handleWidth = 'auto';
$.fn.bootstrapSwitch.defaults.radioAllOff = true;
$.fn.bootstrapSwitch.defaults.onColor = 'info';
var _toggle = $('.make-switch');
$.each(_toggle, function(index, value) {
  $(value)
  .bootstrapSwitch()
@if (isset($defaults['on']['color'])) .bootstrapSwitch('onColor', '{!! $defaults['on']['color'] !!}') @endif
@if (isset($defaults['on']['text'])) .bootstrapSwitch('onText', '{!! $defaults['on']['text'] !!}') @endif
@if (isset($defaults['off']['color'])) .bootstrapSwitch('offColor', '{!! $defaults['off']['color'] !!}') @endif
@if (isset($defaults['off']['text'])) .bootstrapSwitch('offText', '{!! $defaults['off']['text'] !!}') @endif
  ;
});
