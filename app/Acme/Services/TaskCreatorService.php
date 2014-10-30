<?php namespace Acme\Services;

use Acme\Validators\TaskValidator;

use Acme\Validators\ValidationException;

class TaskCreatorService{

	protected $validator;

	public function __construct(TaskValidator $validator)
	{
		$this->validator = $validator;
	}

	public function make(array $attributes)
	{
		if ($this->validator->isValid($attributes))
		{
			Task::create([
				'title'   => $input['title'],
				'body'    => $input['body'],
				'user_id' => $input['assign']
			]);

			return true;
		}

		throw new ValidationException('task validation valied',$this->validator->getErrors());
	
	}

}