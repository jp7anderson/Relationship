<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	public $timestamps = false;

	protected $fillable = ['username' , 'email', 'password'];
	
	protected $table = 'users';

	protected $hidden = array('password', 'remember_token');

	public static $erros;

	public static $rules = [
		'username' => 'required',
		'email' => 'required',
		'password' => 'required'
	];



	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = Hash::make($value);
	}

	public function tasks()
	{	
		return $this->hasMany('Task');
	}

	public static function byUsername($username)
	{
		return static::whereUsername($username)->first();
	}

	public static function isValid($data)
	{
		$validation = Validator::make($data, static::$rules);

		if ($validation->passes()) return true;

		static::$erros = $validation->messages();

		return false;
	}

}
