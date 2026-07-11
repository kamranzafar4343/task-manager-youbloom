@extends('layouts.app')


@section('title', 'tasks')

@section('content')

@if(session('add-success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('add-success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('edit-success'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ session('edit-success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('delete-success'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('delete-success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<!-- Add New Task -->
<a href="{{ route('add') }}" class="btn btn-sm btn-success mb-3">Add Task</a>


<table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Title</th>
                <th>Creation Date</th>
                <th>Status</th> 
                <th>Action</th> 
            </tr>
        </thead>
        <tbody>
           @if (isset($tasks) && $tasks->count() > 0)
                          
           @foreach ($tasks as $task)
            <tr>
               <td>{{$task -> title ?? ''}}</td>
               <td>{{$task -> created_at ?? ''}}</td>
               <td>{{$task -> status ?? ''}}</td>
               
                <td>
                 <a href="{{ route('edit', base64_encode($task->id)) }}" class="btn btn-sm btn-warning">
                    Edit
                 </a>

                   <a href="{{ route('delete', base64_encode($task->id)) }}" class="btn btn-sm btn-danger">delete</a>
               </td>

           </tr>

           @endforeach
           @endif


        </tbody>

@endsection