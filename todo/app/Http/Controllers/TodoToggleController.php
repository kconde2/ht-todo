<?php

namespace App\Http\Controllers;

use App\Todo\Domain\Repository\TodoRepositoryInterface;
use Illuminate\Http\Request;

class TodoToggleController extends Controller
{
    public function __construct(private TodoRepositoryInterface $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $todo = $this->todoRepository->findOne($request->route('id'));

        $this->todoRepository->toggle($todo);

        return back()->with('success', "Tâche '{$todo->text}' mise à jour avec succès");
    }
}
