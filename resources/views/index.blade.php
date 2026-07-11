@extends('layouts.app')

@section('title', 'Task Manager')

@section('content')


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
    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">

        <h5 class="mb-0">
            <span class="badge badge-light ml-2">
                {{ $tasks->count() }} Tasks
            </span>
        </h5>

        <a href="{{ route('add') }}" class="btn btn-success btn-sm">
            + Add Task
        </a>

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

                        <button
                            class="btn btn-sm btn-danger"
                            data-toggle="modal"
                            data-target="#deleteModal{{ $task->id }}">
                            Delete
                        </button>
                        <div class="modal fade" id="deleteModal{{ $task->id }}" tabindex="-1" role="dialog">

            <div class="modal-dialog" role="document">

            <div class="modal-content">

            <div class="modal-header bg-danger text-white">

                <h5 class="modal-title">
                    Delete Task
                </h5>

                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>

            </div>

            <div class="modal-body">

                <p>
                    Are you sure you want to delete
                    <strong>{{ $task->title }}</strong>?
                </p>

                <p class="text-danger mb-0">
                    This action cannot be undone.
                </p>

            </div>

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-secondary"
                    data-dismiss="modal">

                    Cancel

                </button>

                <a
                    href="{{ route('delete', base64_encode($task->id)) }}"
                    class="btn btn-danger">

                    Delete

                </a>

            </div>

            </div>

            </div>

            </div>

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