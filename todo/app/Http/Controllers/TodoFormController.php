<?php

namespace App\Http\Controllers;

use App\Todo\Domain\Exception\TodoNotFoundException;
use App\Todo\Domain\Repository\TodoRepositoryInterface;

use Illuminate\Http\Request;

class TodoFormController extends Controller
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
    public function __invoke(Request $request)
    {
        if ($id = $request->route('id')) {
            try {
                $todo = $this->todoRepository->findOne($id);
            } catch (TodoNotFoundException $exception) {
                abort(404, $exception->getMessage());
            }

            return view('todos/form', ['todo' => $todo]);
        }

        return view('todos/form');
    }
}
