
@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
    @include('common.errors')
{{--    @foreach ($tasks as $task)--}}
    <!-- New Task Form -->
        <form action="{{ url('tasks/'.$task->id) }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <!-- Task Name -->
            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">제목</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control" value="{{ $task->name }}">
                </div>
            </div>
            <div class="form-group">
                <label for="task-description" class="col-sm-3 control-label">내용</label>
                <div class="col-sm-6">
                    <input type="text" name="description" id="task-description" class="form-control" value="{{ $task->description }}">
                </div>
            </div>


            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <span class="fa fa-btn fa-edit"></span> Mod Task
                    </button>
                </div>
            </div>
        </form>
{{--        @endforeach--}}
    </div>
@endsection