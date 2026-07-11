@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h2 class="mb-0">Edit Task</h2>

            <a href="{{ route('index') }}" class="btn btn-secondary">
                ← Back to Tasks
            </a>

        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Please fix the following errors:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-sm">

            <div class="card-header bg-warning text-dark">
                Update Task
            </div>

            <div class="card-body">

                <form action="{{ route('update', base64_encode($Data->id)) }}" method="POST">

                    @csrf

                    <div class="form-group">
                        <label for="title"><strong>Title</strong></label>

                        <input
                            type="text"
                            class="form-control"
                            id="title"
                            name="title"
                            value="{{ old('title', $Data->title) }}"
                            placeholder="Enter task title">
                    </div>

                    <div class="form-group">
                        <label for="description"><strong>Description</strong></label>

                        <textarea
                            class="form-control"
                            id="description"
                            name="description"
                            rows="4"
                            placeholder="Enter task description">{{ old('description', $Data->description) }}</textarea>
                    </div>

                    <div class="form-group">

                        <label for="status"><strong>Status</strong></label>

                        <select class="form-control" id="status" name="status">

                            <option value="">Select Status</option>

                            <option value="Pending"
                                {{ old('status', $Data->status) == 'Pending' ? 'selected' : '' }}>
                                Pending
                            </option>

                            <option value="Completed"
                                {{ old('status', $Data->status) == 'Completed' ? 'selected' : '' }}>
                                Completed
                            </option>

                        </select>

                    </div>

                    <div class="text-right">

                        <a href="{{ route('index') }}" class="btn btn-light">
                            Cancel
                        </a>

                        <button type="submit" class="btn btn-warning">
                            Update Task
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection