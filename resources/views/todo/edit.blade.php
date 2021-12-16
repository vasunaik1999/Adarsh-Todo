@extends('layouts.app')

@section('content')
<div class="container">
      <!-- Navigation Card -->
      <div class="card">
        <div class="card-body pb-0">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('todo.index')}}">Todos</a></li>
                    <li class="breadcrumb-item" aria-current="page">{{$todo->id}}</li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (Session::has('success-message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('success-message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <form action="{{url('/todo/'.$todo->id.'/update')}}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="todo_name" class="form-label">Todo Name</label>
                    <input type="text" class="form-control" id="todo_name" name="todo_name" placeholder="Enter Todo name" value="{{$todo->todo_name}}">
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Description</label>
                    <textarea class="form-control" id="desc" name="description" rows="3" placeholder="Enter description">{{$todo->description}}</textarea>
                </div>
                <button class="btn btn-primary" type="submit">Update Todo</button>
            </form>
        </div>
    </div>
</div>
@endsection