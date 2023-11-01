<?php

namespace direct7\Direct7;

class NotFoundError extends \Exception
{
    private $errorDetails;

    public function __construct($message = "", $errorDetails = "", $code = 0, \Throwable $previous = null)
    {
        $this->errorDetails = $errorDetails;
        $message = empty($errorDetails) ? $message : "$message: $errorDetails";
        parent::__construct($message, $code, $previous);
    }

    public function getErrorDetails()
    {
        return $this->errorDetails;
    }
}

?>
