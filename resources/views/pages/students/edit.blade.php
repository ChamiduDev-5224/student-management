@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')
<div class="container">
    <h2>Edit Student</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('std_update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Student Name:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $student->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $student->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="qualification" class="form-label">Qualification:</label>
            <input type="text" name="qualification" class="form-control" value="{{ old('qualification', $student->qualification) }}" required>
        </div>

        <div class="mb-3">
            <label for="courses" class="form-label">Assign Courses:</label>
            <select name="courses[]" class="form-control" multiple>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}"
                        @if($student->courses->contains($course->id)) selected @endif>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Student</button>
        <a href="{{ route('std_home') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
