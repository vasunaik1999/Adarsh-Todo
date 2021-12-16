@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Navigation Card -->
    <div class="card">
        <div class="card-body pb-0">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('todo.index')}}">Todos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Deleted Records</li>
                </ol>
            </nav>
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
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($todos as $key => $todo)
                    <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <td class="text-capitalize">{{$todo->todo_name}}</td>
                        <td class="text-capitalize">{{$todo->description}}</td>
                        <td>
                            @if($todo->status == 0)
                            <span class="badge rounded-pill bg-danger">Incomplete</span>
                            @else
                            <span class="badge rounded-pill bg-success">Complete</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection