<?php

namespace IbIntegrator\Exceptions;

use Exception;
use Throwable;
use IbIntegrator\Exceptions\ExceptionInterface;

class RequestorException extends Exception implements ExceptionInterface
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

	public function __construct(Throwable $e, $context = null, $message = null)
	{
		if (!$e) {
			throw new $this('Unknown ' . get_class($this));
		}
		$error_message = ErrorString($e, $context, $message);
		parent::__construct($error_message, $e->getCode());
		$this->error_message = $error_message;
		$this->error_code = $e->getCode();
	}

}