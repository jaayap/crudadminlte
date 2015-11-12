<?php namespace Lab25\CrudAdminLte\Http\Services;

use Request, Route, View, Session;

/**
 * https://github.com/RoboTamer
 */

class MsgClass {

 	public static $msgss = array();

  /**
  * Add a message to the message array (adds to the user's session)
  * @param string  $type    You can have several types of messages, these are class names for Bootstrap's messaging classes, usually, info, error, success, warning
  * @param string $message  The message you want to add to the list
  */
  public function add($type='info', $message=FALSE) {
    if (!$message) return FALSE;
    if (is_array($message)) {
      foreach($message as $msg) {
        static::$msgss[$type][] = $msg;
      };
    } else {
      static::$msgss[$type][] = $message;
    };
    Session::flash('messages', static ::$msgss);
  }

  /**
  * Pull back those messages from the session
  * @return array
  */
  public function get() {
    return (Session::has('messages')) ? Session::get('messages') : FALSE;
  }

  /**
  * Gets all the messages from the session and formats them accordingly for Twitter bootstrap.
  * @return string
  */
  public function getHtml() {
    $output = false;
    if (Session::has('messages')) {
      $messages = Session::get('messages');
      foreach($messages as $type => $msgs) {
        if (is_integer($type)) $type = 'danger';
        switch ($type) {
          case 'error':
            $type = 'danger';
            break;
          default:
            $type = $type;
        };
        $output.= '<div class="alert alert-' . $type . '  alert-dismissable">' . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="right:0;">&times;</button>';
        if (is_array($msgs)) {
          foreach($msgs as $msg) $output.= $msg;
        } else {
          $output.= $msgs;
        };
        $output.= '</div>';
      };
    };
    return $output;
  }

}
