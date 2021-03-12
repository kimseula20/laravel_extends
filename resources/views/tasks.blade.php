
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
                        <th>제목</th>
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
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">
                                        <span class="fa fa-btn fa-eye"></span>보기
                                    </button>
                                    <button type="button" onclick="location.href= '{{ url('tasks/'.$task->id.'/edit') }}'" class="btn btn-warning btn-sm">
                                        <span class="fa fa-btn fa-edit"></span>수정
                                    </button>
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
            <div class="text-center">
                {{ $tasks->links() }}
            </div>
        </div>
    @endif
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $task->name }}</h5>
                    {{--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                    {{--                            <span aria-hidden="true">&times;</span>--}}
                    {{--                        </button>--}}
                </div>
                <div class="modal-body">
                    <label>내용</label>
                    <div>
                        {{ $task->description }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">닫기</button>
                    <button type="button" class="btn btn-success btn-sm">확인</button>
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
@endsection