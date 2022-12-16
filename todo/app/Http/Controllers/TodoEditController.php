<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoPostRequest;
use App\Todo\Domain\Exception\TodoNotFoundException;
use App\Todo\Domain\Model\Todo;
use App\Todo\Domain\Repository\TodoRepositoryInterface;
use DateTime;

class TodoEditController extends Controller
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
    public function __invoke(TodoPostRequest $todoPostRequest)
    {
        $id = $todoPostRequest->route('id');
        if ($id && TodoPostRequest::METHOD_PUT === $todoPostRequest->method()) {
            try {
                $todo = $this->todoRepository->findOne($id);
            } catch (TodoNotFoundException $exception) {
                abort(404, $exception->getMessage());
            }

            $todo->text = $todoPostRequest->task;
            $todo->updatedAt = new DateTime();

            $this->todoRepository->update($todo);

            return to_route('todo-list')->with('success', 'Tâche modifiée avec succès');
        }

        $this->todoRepository->save(new Todo(text: $todoPostRequest->task));
        return to_route('todo-list')->with('success', 'Tâche ajoutée avec succès');
    }
}
