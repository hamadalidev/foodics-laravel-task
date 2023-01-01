<?php

namespace App\Exceptions;

use Exception;

class ErrorException extends Exception
{
    private $name;

    private $params;

    private $statusCode;

    /**
     * @param $name
     * @param $params
     * @param $statusCode
     */
    public function __construct($name, $params = [], $statusCode = 500)
    {
        $this->name = $name;
        $this->params = $params;
        $this->statusCode = $statusCode;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array|mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @return int|mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }
}
