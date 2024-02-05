<?php

namespace App\Exceptions;

use Exception;

final class DomainException extends Exception
{
    public static function because(string $message): self
    {
        return new self($message);
    }
}
