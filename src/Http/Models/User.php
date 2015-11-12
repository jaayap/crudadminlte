<?php namespace Lab25\CrudAdminLte\Http\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use LaravelArdent\Ardent\Ardent;
use DB, Hash;

class User extends Ardent implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract {

  use Authenticatable, Authorizable, CanResetPassword;

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'users';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['name', 'email', 'password', 'active'];

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = ['password', 'remember_token'];

  /**
   * Settings defined for Ardent
   *
   * @var boolean
   */
  public $autoPurgeRedundantAttributes  = TRUE;
  public $autoHydrateEntityFromInput    = TRUE;    // hydrates on new entries' validation
  public $forceEntityHydrationFromInput = TRUE;
  public static $throwOnFind = true;

  public static $rules = array();
  public static $customMessages = array();

  // public function beforeValidate() {
  //   $v = \UI::getValidation();
  //   // \_e::prex( $v );
  //
  //   static::$rules = $v['validation'];
  //   static::$customMessages = $v['messages'];
  //
  //   // \_e::pre( self::$rules );
  //   // die('beforeValidate()');
  //
  //   return true;
  // }

  // public function afterValidate() {
  //   if ( sizeof($this->errors()) > 0 ) {
  //     return back()->withErrors($this->errors());
  //   };
  //   return true;
  // }

  /**
   * Triggered before saving the model.
   *
   * @return true
   */
  public function beforeSave() {
    // die('....FUCK');

    // if there's a new password, hash it
    // if ($this->isDirty('password')) {
    //   $this->password = Hash::make($this->password);
    // };

    return true;
  }

  public function save(
    array $rules = array(),
    array $customMessages = array(),
    array $options = array(),
    Closure $beforeSave = null,
    Closure $afterSave = null
  ) {

    $type = 'NEW';
    if (request()->is('*/update/*'))
      $type = 'UPDATE';
    $v = \UI::getValidation($type, $this->id);
    // \_e::prex( $v );

    $rules = array_merge($rules, $v['validation']);
    $customMessages = array_merge($rules, $v['messages']);

    return parent::save($rules, $customMessages, $options, $beforeSave, $afterSave);
  }

  /**
   * Triggered after successfully saving the model.
   *
   * @return true
   */
  public function afterSave() {

    \Msg::add('success', $this->name.'.');

    // if there's a new password, hash it
    // if ($this->isDirty('password')) {
    //   $this->password = Hash::make($this->password);
    // };

    return true;
  }

  /*---------------------------------------------------------------------------------*/
  public function setPasswordAttribute($value) {
    if ($value != NULL || $value != '') {
      $this->attributes['password'] = bcrypt($value);
    };
    // $this->attributes['password'] = Hash::make($value);
  }
  // public function setRememberTokenAttribute($value) {
  //   $this->attributes['remember_token'] = str_random(10);
  // }

	/**
	 * Helper class to return SELECT LIST OPTIONS from model
	 *
	 * @var array
	 */
	public static function selectList() {
    $list = User::
      select(DB::raw("
        `id` AS value,
        CONCAT(`name`, ' [', `email`, ']') AS label
      "))
      ->where('id','>',0)
      ->limit(20)->get();
    return $list->lists('label', 'value');
	}

}
