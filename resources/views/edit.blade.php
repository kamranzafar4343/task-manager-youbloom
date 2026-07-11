@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')

@if(session('success'))
<p class="text-muted">{{ session('success') }}</p>
@endif

<h3>
    <a href="{{ route('index') }}" class="btn btn-sm btn-primary">
        See all Tasks
    </a>
</h3>

<form action="{{ route('update', base64_encode($Data->id)) }}" method="post">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" aria-describedby="" value="{{ $Data->title }}" name="title">
  </div>
  
  <div class="mb-3">
    <label for="" class="form-label">Description (Optional)</label>
    <input type="text" class="form-control" id="description" aria-describedby="" value="{{ $Data->description }}" name="description">
  </div>

  <div class="mb-3">
    <label for="status" class="form-label">Status</label>

    <select class="form-control" id="status" name="status">
        <option value="">Select Status</option>
        <option value="Pending" {{ $Data->status == 'Pending' ? 'selected' : '' }}>
            Pending
        </option>
        <option value="Completed" {{ $Data->status == 'Completed' ? 'selected' : '' }}>
            Completed
        </option>
    </select>
</div>
    
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection