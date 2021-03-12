<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class TaskController extends Controller
{

    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $tasks = DB::table('tasks')->where('user_id', $request->user()->id)->where('is_delete', 'N')->paginate(15);
//        $tasks = DB::select('SELECT * FROM tasks WHERE user_id = ? AND is_delete = "N"', [$request->user()->id]);

        $tasks = $this->tasks->infoTaskList($request);

        return view('tasks', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreTaskPost $request)
    {
        $result = $this->tasks->insertTask($request);

        if($result){
            return redirect('/tasks');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = $this->tasks->infoTask($id);

        return view('modify', ['task'=>$task[0]]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\StoreTaskPost $request, $id)
    {
        $result = $this->tasks->updateTask($request, $id);

        if($result) {
            return redirect('/tasks');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $this->authorize('destroy', $task);

        $result = $this->tasks->deleteTask($task);

        if($result) {
            return redirect('/tasks');
        }
    }
}
