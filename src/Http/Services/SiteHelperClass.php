<?php namespace Ivus\CrudAdminLte\Http\Services;

class SiteHelperClass {

  public static function formatLongDate($date) {
		$format = 'jS F Y @ h:i:sa';
		return date($format,strtotime($date));
	}

	public static function formatLongDateFull($date) {
		$format = 'l, jS F Y';
		return date($format,strtotime($date));
	}

	public static function formatLongDateTimeFull($date) {
		$format = 'l, jS F Y @ h:i:s a';
		return date($format,strtotime($date));
	}

	public static function formatLongDateOnly($date) {
		$format = 'd F Y';
		return date($format,strtotime($date));
	}

	public static function formatLongNumber($number,$decimal=0,$dec_point=".",$thousands_sep=",") {
		return number_format($number, $decimal, $dec_point, $thousands_sep);
	}

	public static function emailize($address) {
		return '<a href="mailto:'.$address.'">'.$address.'</a>';
	}

	public static function formatToUserCurrency($val,$currency) {
		$val		= str_replace(',','',$val);
		$denoms		= Config::get('_system.denominations');
		return $denoms[$currency]. number_format((float)$val, 2, '.', '') .'<small>'.$currency.'</small>';
	}

	public static function formatToUserCurrencyShort($val,$currency) {
		$val		= str_replace(',','',$val);
		$denoms		= Config::get('_system.denominations');
		return $denoms[$currency]. number_format((float)$val, 2, '.', '');
	}

	public static function formatToUserCurrencyConverted($val,$currency,$conversion=NULL) {
		$val		= str_replace(',','',$val);
		$denoms		= Config::get('_system.denominations');

		$return		= '';
		$return		.= ($currency == 'AUD') ? '<strong>' : '';
		$return		.= $denoms[$currency]. number_format((float)$val, 2, '.', '') .'<small>'.$currency.'</small>';
		$return		.= ($currency == 'AUD') ? '</strong>' : '';

		if (isset($conversion)) {
			if ($currency == 'USD' && isset($conversion['USDAUD'])) {
				//_e::prex($conversion['USDAUD']);
				$return		.= '<em> (approx. <strong>$'.number_format((float)($val*$conversion['USDAUD']), 2, '.', '').'<small>AUD*</small></strong>)</em>';
			};
			if ($currency == 'EUR' && isset($conversion['EURAUD'])) {
				//_e::prex($conversion['USDAUD']);
				$return		.= '<em> (approx. <strong>$'.number_format((float)($val*$conversion['EURAUD']), 2, '.', '').'<small>AUD*</small></strong>)</em>';
			};
		};
		return $return;
	}

	public static function _getDateTime() {
		return date('_d-m-Y_His');
	}

	public static function slugify($text) {
	  // replace non letter or digits by -
	  $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
	  // trim
	  $text = trim($text, '-');
	  // transliterate
	  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	  // lowercase
	  $text = strtolower($text);
	  // remove unwanted characters
	  $text = preg_replace('~[^-\w]+~', '', $text);
	  if (empty($text)) {
  		return 'n-a';
	  }
	  return $text;
	}

	public static function slugUsername($text) {
	  // trim
	  $text = trim($text, '-');
	  // transliterate
	  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	  // lowercase
	  $text = strtolower($text);
	  // remove unwanted characters
	  $text = preg_replace('~[^-\w]+~', '-', $text);
	  if (empty($text)) {
  		return '';
	  }
	  return $text;
	}

}
