<?php

declare(strict_types=1);

namespace App\Todo\Domain\Exception;

final class TodoUnableToDeleteException extends \RuntimeException
{
    public function __construct(string $id, int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct(sprintf('Unable to delete todo id %s', $id), $code, $previous);
    }
}