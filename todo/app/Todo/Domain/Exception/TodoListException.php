<?php

declare(strict_types=1);

namespace App\Todo\Domain\Exception;

final class TodoListException extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct('Cannot retrieve any todo');
    }
}
