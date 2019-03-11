<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\DownloadResource;
use App\Repositories\TaskRepository;
use App\Task;
use Illuminate\Http\Request;

/**
 * Class TaskController
 * @package App\Http\Controllers
 */
class TaskController extends Controller
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        return Task::all();
    }

    /**
     * @param $id
     * @return Task
     */
    public function view($id)
    {
        return Task::findOrFail($id);
    }

    /**
     * @param Request $request
     * @return Task
     */
    public function create(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:1024',
            'due_datetime' => 'required|date_format:"Y-m-d H:i:s"',
            'priority' => 'required|integer|between:1,3',
        ]);

        $task = new Task();
        $task->fill($data);
        $task->status = Task::STATUS_NEW;
        $task->save();
        return $task;
    }

    /**
     * @param Request $request
     * @param $id
     * @return Task
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'max:255',
            'description' => 'max:1024',
            'due_datetime' => 'date_format:"Y-m-d H:i:s"',
            'priority' => 'integer|between:1,3',
            'status' => 'integer|between:1,3',
        ]);

        $task = Task::findOrFail($id);
        $task->fill($data);
        $task->save();
        return $task;
    }

    /**
     * @param $id
     * @return array
     */
    public function delete($id){
        $task = Task::findOrFail($id);
        $result = $task->delete();
        return ['success' => $result];
    }
}
