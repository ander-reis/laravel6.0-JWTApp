<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use JWTAuth;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * @var
     */
    protected $user;

    /**
     * TaskController constructor.
     */
    public function __construct()
    {
//        $this->user = JWTAuth::parseToken()->authenticate();
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $tasks = Task::all(['title', 'description']);
        return response()->json($tasks);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);

        if (!$task) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, task with id ' . $id . ' cannot be found.'
            ], 400);
        }

        return $task;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;

        if ($task->create($task->toArray()))
            return response()->json([
                'success' => true,
                'task' => $task
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Sorry, task could not be added.'
            ], 500);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        if (!$task) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, task with id ' . $id . ' cannot be found.'
            ], 400);
        }

        $updated = $task->fill($request->all())->save();

        if ($updated) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, task could not be updated.'
            ], 500);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        if (!$task) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, task with id ' . $id . ' cannot be found.'
            ], 400);
        }

        if ($task->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Task could not be deleted.'
            ], 500);
        }
    }
}
