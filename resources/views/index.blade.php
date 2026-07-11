@extends('layouts.app')


@section('title', 'tasks')

@section('content')


<!-- Add New Task -->
<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
    Add Task
</button>


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
                 <a href="" class="btn btn-sm btn-warning">
                    Edit
                 </a>

                   <a href="" class="btn btn-sm btn-danger">delete</a>
               </td>

           </tr>

           @endforeach
           @endif


        </tbody>

@endsection