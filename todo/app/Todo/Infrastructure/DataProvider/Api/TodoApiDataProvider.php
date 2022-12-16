<?php

declare(strict_types=1);

namespace App\Todo\Infrastructure\DataProvider\Api;

use App\Todo\Domain\Exception\TodoListException;
use App\Todo\Domain\Exception\TodoNotFoundException;
use App\Todo\Domain\Exception\TodoSaveException;
use App\Todo\Domain\Model\Todo;
use App\Todo\Domain\Model\Todos;
use App\Todo\Domain\Repository\TodoRepositoryInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

final class TodoApiDataProvider implements TodoRepositoryInterface
{
    public function findOne(string $id): Todo
    {
        try {
            $response = Http::todoApi()->get("/{$id}");

            if ($response->successful()) {
                return Todo::fromArray($response->json());
            }
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
        throw new TodoNotFoundException($id);
    }

    public function getAll(): Todos
    {
        $todos = new Todos([]);

        try {
            $response = Http::todoApi()->get('/');

            if ($response->successful()) {
                foreach ($response->json() as $todoArray) {
                    $todos->add($todoArray);
                }
            }
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            throw new TodoListException();
        }
        return $todos;
    }

    public function save(Todo $todo): Todo
    {
        try {
            $response = Http::todoApi()->post('/', $todo->toArray());

            if ($response->successful()) {
                $newTodo = Todo::fromArray($response->json());
                return $newTodo;
            }
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            throw new TodoListException();
        }
    }

    public function update(Todo $todo): Todo
    {
        try {
            $response = Http::todoApi()->put("/{$todo->id}", $todo->toArray());

            if ($response->successful()) {
                $newTodo = Todo::fromArray($response->json());
                return $newTodo;
            }
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            throw new TodoListException();
        }
    }

    public function remove(string $id): void
    {
        try {
            Http::todoApi()->delete("/{$id}");
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            throw new TodoUnableToDeleteException();
        }
    }

    public function toggle(Todo $todo): Todo
    {
        $todo->toggle();

        try {
            $response = Http::todoApi()->put("/{$todo->id}", $todo->toArray());

            if ($response->successful()) {
                return Todo::fromArray($response->json());
            }
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            throw new TodoSaveException($id);
        }
    }
}
