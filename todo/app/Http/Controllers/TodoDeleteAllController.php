<?php

namespace App\Http\Controllers;

use App\Todo\Domain\Repository\TodoRepositoryInterface;

class TodoDeleteAllController extends Controller
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

        foreach ($todos as $todo) {
            $this->todoRepository->remove($todo->id);
        }

        return back()->with('success', "Tâches supprimées avec succès");
    }
}
