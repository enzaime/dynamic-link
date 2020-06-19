<?php

namespace Enzaime\DynamicLink;

use Exception;

class LinkGenerationException extends Exception
{
    public function __construct(string $message = "", int $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}