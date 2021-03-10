
@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <div class="container">
            <button type="button" class="btn btn-sm btn-info" onclick="location.href='{{ route('tasks.create') }}'">
                <i class="fa fa-plus"></i> 추가하기
            </button>
        </div>
    </div>

    <!-- TODO: Current Tasks -->

    @if (count($tasks) > 0)
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    게시글
                </div>
                <div class="panel-body">
                    <table class="table table-striped task-table">

                        <!-- Table Headings -->
                        <thead>
                        <th>이름</th>
                        <th>내용</th>
                        <th>생성일자</th>
                        <th>업데이트일자</th>
                        <th></th>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>
                                <td>
                                    <div>{{ $task->description }}</div>
                                </td>
                                <td>
                                    <div>{{ $task->created_at }}</div>
                                </td>
                                <td>
                                    <div>{{ $task->updated_at }}</div>
                                </td>
                                <td>
                                    <button type="button" onclick="location.href= '{{ url('tasks/show/'.$task->id) }}'" class="btn btn-success btn-sm">
                                        <span class="fa fa-btn fa-eye"></span>보기
                                    </button>
                                    <button type="button" onclick="location.href= '{{ url('tasks/create/'.$task->id) }}'" class="btn btn-warning btn-sm">
                                        <span class="fa fa-btn fa-edit"></span>수정
                                    </button>
{{--                                    <button type="button"  onclick="location.href= '{{ url('tasks/delete/'.$task->id) }}'" class="btn btn-danger btn-sm">--}}
{{--                                        <i class="fa fa-btn fa-trash"></i>삭제--}}
{{--                                    </button>--}}
                                    <form action="{{ url('tasks/'.$task->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> 삭제
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
@endsection