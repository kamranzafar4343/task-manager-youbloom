@extends('layouts.app')


@section('title', 'tasks')

@section('content')

@if(session('add-success'))
<p class="text-muted">{{ session('add-success') }}</p>
@endif

@if(session('edit-success'))
<p class="text-muted">{{ session('edit-success') }}</p>
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

                   <a href="" class="btn btn-sm btn-danger">delete</a>
               </td>

           </tr>

           @endforeach
           @endif


        </tbody>

@endsection