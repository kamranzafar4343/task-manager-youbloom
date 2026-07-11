@extends('layouts.app')

@section('title', 'Add Task')

@section('content')

@if(session('success'))
<p class="text-muted">{{ session('success') }}</p>
@endif

<h3>
    <a href="{{ route('index') }}" class="btn btn-sm btn-primary">
        See all Tasks
    </a>
</h3>

<form action="{{ route('store') }}" method="post">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" aria-describedby="" value="{{ old('title') }}" name="title">
  </div>
  
  <div class="mb-3">
    <label for="" class="form-label">Description (Optional)</label>
    <input type="text" class="form-control" id="description" aria-describedby="" value="{{ old('description') }}" name="description">
  </div>

  <div class="mb-3">
    <label for="status" class="form-label">Status</label>

    <select class="form-control" id="status" name="status">
        <option value="">Select Status</option>
        <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>
            Pending
        </option>
        <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>
            Completed
        </option>
    </select>
</div>
    
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection