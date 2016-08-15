
// SCRIPT FOR SYSTEM NOTIFICATIONS

  {{-- \_e::pre($defaults) --}}

  var interval = null;

  function updateNotification() {
    clearInterval(interval); // stop the interval
  @foreach ($defaults['buckets'] as $bucket)

    $('{!! '.dropdown.'.strToLower($bucket['name']).'-menu span.label' !!}').html('').hide();
    $('{!! '.dropdown.'.strToLower($bucket['name']).'-menu ul.dropdown-menu > li.header' !!}').html('').hide();
    $('{!! '.dropdown.'.strToLower($bucket['name']).'-menu ul.menu' !!}').empty().hide();
    $.ajax({
      url: '{{ $bucket['url'] }}',
      success: function(data){
        $('{!! '.dropdown.'.strToLower($bucket['name']).'-menu span.label' !!}').html(data.length).show();
        $('{!! '.dropdown.'.strToLower($bucket['name']).'-menu ul.dropdown-menu > li.header' !!}').html('You have '+data.length+' {!! strToLower($bucket['name']) !!}').show();
        $.each( data, function( index, value ){
          var _li = $('<li>').html(value).appendTo('{!! '.dropdown.'.strToLower($bucket['name']).'-menu ul.menu' !!}');
        });
        $('{!! '.dropdown.'.strToLower($bucket['name']).'-menu ul.menu' !!}').show();
        setInterval(updateNotification, {{ $defaults['interval'] }} );
      },
      error: function(){
        clearInterval(interval); // stop the interval
        console.log('error');
      }
    });
  @endforeach

  }

  // updateNotification();
