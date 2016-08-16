
	"use strict";

	var pageTop = function (){
	  return $('.main-header').height();
	}

	var initScrolling =	function() {
		var _offset = 500;
		$('#top-link').hide();

		$(window).scroll(function(e) {
			var offsetY = $(window).scrollTop();
			if (offsetY >= _offset) {
				$('#top-link').show();
			} else if (offsetY < _offset ) {
				$('#top-link').hide();
			}
		});
		$('#top-link').bind('click', function(e) {
			e.preventDefault;
			animScrollTo( $(this).attr('href') );
		});
	};

	var animScrollTo =	function(id, scrollFinishFunction) {
		var duration	= 500;
		var easing		= 'swing';
		var target		= $(id).offset().top;
		$('html:not(:animated),body:not(:animated)').animate({ scrollTop: target }, duration, easing);
	} ;

	var srchClear =	function() {
		$('#frmSearch ._reset').prop('disabled', (( $('#frmSearch #search').val() == '' ) ? true : false ) );
		/*
		if( $('#frmSearch #search').val() == '' ) {
			$('#frmSearch ._reset').hide();
		} else {
			$('#frmSearch ._reset').show();
		};
		*/
	};

	//	-----------------------------------------------------------------	//

	$(function() {

		// Prevent empty search terms
		$('#frmSearch').bind('submit', function(e) {
			if( $(this).find('#search').val() ) return true;
			return false;
		});
		// Reset search terms
		$('#frmSearch ._reset').bind('click', function(e) {
			e.preventDefault();
			$('#frmSearch #search').val('----------------------------------------------------------------------------------/reset');
			$('#frmSearch').submit();
			return false;
		});
		// Disable search reset button
		$('#frmSearch #search').bind('change', function(e) {
			srchClear();
		});
		srchClear();

		// Initialize Select2 Elements
		$('.select2').select2();

		// Initialize Data-Mask
		$('[data-mask]').inputmask();

		// iCheck for checkbox and radio inputs
		$('input[type="checkbox"]._icheck, input[type="radio"]._icheck').iCheck({
			checkboxClass: 'icheckbox_custom',
			radioClass: 'iradio_custom'
		});

		// Timepicker
		$('.timepicker').timepicker({
			showInputs: false,
			secondStep: 1,
			minuteStep: 1,
			explicitMode: true,
			icons: {
				up: 'fa fa-caret-up',
				down: 'fa fa-caret-down'
			},
			defaultTime: false,
		});

		// Colour Picker
		$('._colorpicker').colorpicker({
			customClass: 'colorpicker-2x',
			align: 'left',
			sliders: {
				saturation: {
					maxLeft: 200,
					maxTop: 200
				},
				hue: {
					maxTop: 200
				},
				alpha: {
					maxTop: 200
				}
			}
		});

		// Bootstrap File Style
		$('._filestyle').filestyle({
			input: true,
			icon: true,
			buttonText: '',
			buttonName: 'btn-flat',
			iconName: 'fa fa-folder-open-o',
			buttonBefore: true,
		});

	});

	$(document).ready(function() {

		$('#_displayOptionBtn').bind('click', function(e) {
			try {
				setTimeout(function(){
					$('#_displayOption').find('button').trigger('click');
				},10);
		    } catch(ex) {
		        alert('An error occurred and I need to write some code to handle this!');
		    }
		    e.preventDefault();
		});

		$('table.table-fixed-head').floatThead({
			// scrollingTop: pageTop,
			// useAbsolutePositioning: false
			position:'auto',
			top: pageTop,
		});

		$('.alert-dismissable').delay(4000).animate({
			opacity: 0
		}, 500, function() {
			$(this).remove();
		});

		initScrolling();

	});
