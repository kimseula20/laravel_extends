<?php

namespace App\Repositories;

use App\User;
use App\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;

class TaskRepository
{
    public function infoTaskList(Request $request)
    {
        return DB::table('tasks')
            ->where('user_id', $request->user()->id)
            ->where('is_delete', 'N')
            ->orderBy('created_at', 'DESC')
            ->paginate(15);
    }

    /**
     * @param Requests\StoreTaskPost $request
     * @return mixed
     * $request->user()->tasks()->create([
        'name' => $request->name,
        'description' => $request->description,
        ]);
     */
    public function insertTask(Requests\StoreTaskPost $request)
    {
        $sql = "INSERT INTO tasks (
                                    user_id, 
                                    name, 
                                    description, 
                                    created_at, 
                                    updated_at
                                    )
                VALUES (?, ?, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
        $param = [
            $request->user()->id,
            $request->name,
            $request->description
        ];

        return DB::insert($sql, $param);
    }

    public function infoTask($id)
    {
        $sql = 'SELECT * 
                FROM tasks 
                WHERE id = ?';
        $param = [
            $id
        ];
        return DB::select($sql, $param);
    }

    public function updateTask(Requests\StoreTaskPost $request, $id)
    {
        $sql = 'UPDATE tasks
                SET name = ?,
                    description = ?
                WHERE id = ?';
        $param = [
            $request->name
            , $request->description
            , $id
        ];

        return DB::update($sql, $param);
    }

    public function deleteTask(Task $task)
    {
        $sql = 'UPDATE tasks
                SET is_delete = "Y"
                WHERE id = ?';

        $param = [
            $task->id
        ];

        return DB::update($sql, $param);
    }
}