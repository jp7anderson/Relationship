<?php namespace Acme\Services;

use Acme\Validators\TaskValidator;

use Acme\Validators\ValidationException;

class TaskCreatorService{

	protected $validator;

	public function __construct(TaskValidator $validator)
	{
		//$this->validator recebe os dados de post
		$this->validator = $validator;
	}

	public function make(array $attributes)
	{
		//Faz a validacao atraves do isValid
		if ($this->validator->isValid($attributes))
		{
			Task::create([
				'title'   => $input['title'],
				'body'    => $input['body'],
				'user_id' => $input['assign']
			]);

			//se for valido cadastra
			return true;
		}

		//se nao for valido mostra o erro
		throw new ValidationException('task validation valied',$this->validator->getErrors());
	
	}

}