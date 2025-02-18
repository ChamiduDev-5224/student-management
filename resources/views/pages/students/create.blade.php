@extends('layouts.app')

@section('title', 'Add Student')

@section('content')
<div class="container">
    <h2 class="mb-4">Add New Student</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('std_store') }}" method="POST">
        @csrf

        <!-- Student Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Student Name:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <!-- Qualifications -->
        <div class="mb-3">
            <label for="qualification" class="form-label">Qualification:</label>
            <input type="text" name="qualification" class="form-control" value="{{ old('qualification') }}" required>
        </div>

        <!-- Course Selection -->
        <div class="mb-3">
            <label for="courses" class="form-label">Assign Courses:</label>
            <select name="courses[]" id="course-select" class="form-control" multiple>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>


        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Save Student</button>
        <a href="{{ route('std_home') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>


@endsection
