@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <a href="{{url('todo/create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Todo</a>
                    <a href="{{url('todo/deleted-records')}}" class="btn btn-primary"><i class="fas"></i> Deleted Records</a>
                    <!-- <a href="{{Route('todo.create')}}" class="btn btn-primary">Add Todo</a> -->
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            @if (Session::has('success-message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('success-message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <table class="table table-striped table-borderless">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Todo Name</th>
                        <th>Description</th>
                        <!-- <th>Status</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($todos as $key => $todo)
                    <tr>
                        <!-- can use both type of syntax $todo['id'] as well as $todo->id  -->
                        <!-- <th scope="row">{{$todo['id']}}</th> -->
                        <th scope="row">{{$key + 1}}</th>
                        <td class="text-capitalize">{{$todo->todo_name}}</td>
                        <td class="text-capitalize">{{$todo->description}}</td>
                        <!-- <td>
                            @if($todo->status == 0)
                            <span class="badge rounded-pill bg-danger">Incomplete</span>
                            @else
                            <span class="badge rounded-pill bg-success">Complete</span>
                            @endif
                        </td> -->
                        <td>
                            <!-- <i class="fas fa-check-circle"></i> 
                        <i class="fas fa-times-circle"></i>-->
                            @if($todo->status == 0)
                            <a href="{{url('/todo/'.$todo->id.'/mark-complete')}}" class="btn btn-warning">Incomplete</a>
                            @else
                            <a href="{{url('/todo/'.$todo->id.'/mark-incomplete')}}" class="btn btn-success">Completed</a>
                            @endif
                            <a href="{{url('/todo/'.$todo->id.'/edit')}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <a href="{{url('/todo/'.$todo->id.'/delete')}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection