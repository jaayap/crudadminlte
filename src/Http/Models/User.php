<?php namespace Lab25\CrudAdminLte\Http\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use DB, Hash;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract {

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
  protected $fillable = ['name', 'email', 'password'];

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = ['password', 'remember_token'];

  /*---------------------------------------------------------------------------------*/
  public function setPasswordAttribute($value) {
    $this->attributes['password'] = bcrypt($value);
    // $this->attributes['password'] = Hash::make($value);
  }
  // public function setNameAttribute($value) {
  //   $this->attributes['name'] = strtolower($value);
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
