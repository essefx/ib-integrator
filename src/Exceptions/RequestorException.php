<?php

namespace IbIntegrator\Exceptions;

use IbIntegrator\Exceptions\ExceptionInterface;

class RequestorException extends \Exception implements ExceptionInterface
{

	protected $error_code;
	protected $error_message;

	//

	public function getErrorCode()
	{
		return $this->error_code;
	}

	public function getErrorMessage()
	{
		return $this->error_message;
	}

	//

	public function __construct($message, $status_code = null, $error_code = 0, $previous = null)
	{
		if (!$message) {
			throw new $this('Unknown ' . get_class($this));
		}
		$error_message = $message .
			implode('/', [
				$status_code ? "SC$status_code" : null,
				$error_code ? "EC$error_code" : null,
			]);
		parent::__construct($error_message, $error_code, $previous);
		$this->error_message = $error_message;
		$this->error_code = $error_code;
	}

}