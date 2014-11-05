<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use GeneaLabs\Bones\Keeper\BonesKeeperTrait;

class User extends \BaseModel implements UserInterface, RemindableInterface {

	use UserTrait;
	use RemindableTrait;
	use BonesKeeperTrait;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array('password', 'remember_token');
	
	public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

}
