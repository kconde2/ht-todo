<?php

declare(strict_types=1);

namespace App\Todo\Domain\Model;

final class Todos
{
    public function __construct(
        /** @var Todo[] */
        private array $list,
    ) {
    }

    public function latests(): array
    {
        $list = $this->list;

        usort($list, fn ($a, $b) => $b->createdAt <=> $a->createdAt);

        return $list;
    }

    public function add(array $todoArray)
    {
        $this->list[] = Todo::fromArray($todoArray);
    }
}
