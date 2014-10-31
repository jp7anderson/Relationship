<?php

use Acme\Validators\TaskValidator as Validator;

class Task extends BaseModel{

	protected $guarded = ['id'];

	protected static $rules = [
		'title' => 'required',
		'body'  => 'required',
		'user_id' => 'required'
	];


	public function user()
	{
		//comparacao para saber se pertence a tabela
		return $this->belongsTo('User');
	}

	//procurando usuarios pelo id e username
	public static function find($id, $username = null)
	{
		$task = static::with('user')->find($id);

		if($username and $task->user->username !== $username)
			throw new Illuminate \ Database \ Eloquent \ ModelNotFoundException;

		return $task;
	}

	public static function byUsername($username)
	{
		return User::byUsername($username)->tasks;
	}

}