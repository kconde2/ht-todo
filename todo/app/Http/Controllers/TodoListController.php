<?php

namespace App\Http\Controllers;

use App\Todo\Domain\Repository\TodoRepositoryInterface;

class TodoListController extends Controller
{
    public function __construct(private TodoRepositoryInterface $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $todos = $this->todoRepository->getAll()->latests();

        return view('todos/index', ['todos' => $todos]);
    }
}
