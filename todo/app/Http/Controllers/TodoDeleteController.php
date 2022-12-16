<?php

namespace App\Http\Controllers;

use App\Todo\Domain\Repository\TodoRepositoryInterface;
use Illuminate\Http\Request;

class TodoDeleteController extends Controller
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
        $this->todoRepository->remove($request->route('id'));

        return back()->with('success', "Tâche supprimée avec succès");
    }
}
