<?php namespace Acme\Validators;

use Exception;

class ValidationException extends Exception{

	protected $errors;

	public function __contruct($message, $errors, $code = 0, Exception $previous = null)
	{
		$this->errors = $errors;

		parent::__contruct($message, $code, $previous);
	}

	public function getErrors()
	{
		return $this->errors;
	}
}