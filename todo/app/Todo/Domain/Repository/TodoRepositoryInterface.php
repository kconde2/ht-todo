<?php

declare(strict_types=1);

namespace App\Todo\Domain\Repository;

use App\Todo\Domain\Model\Todo;
use App\Todo\Domain\Model\Todos;

interface TodoRepositoryInterface
{
    /**
     * Get todo list
     *
     * @return Todos
     */
    public function getAll(): Todos;

    /**
     * @param string $id
     * @return Todo
     */
    public function findOne(string $id): Todo;

    /**
     * @param Todo $todo
     * @return Todo
     */
    public function save(Todo $todo): Todo;

    /**
     *
     * @param Todo $todo
     * @return Todo
     */
    public function update(Todo $todo): Todo;

    /**
     * @param string $id
     * @return Todo
     */
    public function remove(string $id): void;

    /**
     * @param Todo $todo
     * @return Todo
     */
    public function toggle(Todo $todo): Todo;
}
