@extends('layouts.app')

@section('title', 'Task Manager')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-0">Task Manager</h2>
        <small class="text-muted">Manage your daily tasks</small>
    </div>

    <a href="{{ route('add') }}" class="btn btn-success">
        + Add Task
    </a>
</div>

@if(session('add-success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('add-success') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
@endif

@if(session('edit-success'))
    <div class="alert alert-info alert-dismissible fade show">
        {{ session('edit-success') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
@endif

@if(session('delete-success'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{ session('delete-success') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
@endif

<div class="card shadow-sm">
    <div class="card-header bg-dark text-white">
        Total Tasks: {{ $tasks->count() }}
    </div>

    <div class="card-body p-0">

        <table class="table table-hover table-bordered mb-0">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Created</th>
                    <th>Status</th>
                    <th width="180">Actions</th>
                </tr>
            </thead>

            <tbody>

            @forelse($tasks as $task)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $task->title }}</td>

                    <td>{{ $task->created_at->format('d M Y') }}</td>

                    <td>

                        @if($task->status == 'Completed')

                            <span class="badge badge-success">
                                Completed
                            </span>

                        @else

                            <span class="badge badge-warning">
                                Pending
                            </span>

                        @endif

                    </td>

                    <td class="text-center">

                        <a href="{{ route('edit', base64_encode($task->id)) }}"
                           class="btn btn-sm btn-warning">
                            Edit
                        </a>

                        <a href="{{ route('delete', base64_encode($task->id)) }}"
                           class="btn btn-sm btn-danger">
                            Delete
                        </a>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center text-muted py-4">
                        No tasks found.
                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>
</div>

@endsection