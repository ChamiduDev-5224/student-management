@extends('layouts.app')

@section('title', 'Students List')

@section('content')
<div class="d-flex justify-content-between">
    <h2>Students List</h2>
    <a href="{{ route('std_create') }}" class="btn btn-success">Add Student</a>
</div>

<table class="table table-bordered mt-3">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Courses</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>
                @foreach($student->courses as $course)
                    <span class="badge bg-primary">{{ $course->name }}</span>
                @endforeach
            </td>
            <td>
                <a href="{{ route('std_edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('std_delete', $student->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
