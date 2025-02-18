<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Repositories\StudentRepositoryInterface as RepositoriesStudentRepositoryInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $studentRepository;

    public function __construct(RepositoriesStudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    // Fetch and display students list
    public function index()
    {
        $students= $this->studentRepository->getAll();
        return view('pages.students.index', compact('students'));
    }

    // Show create student form
    public function create()
    {
        $courses = Course::all();
        $students= $this->studentRepository->getAll();
        return view('pages.students.create', compact('courses','students'));
    }

    // Store student data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'qualification' => 'required|string|max:255',
            'courses' => 'array'
        ]);

        $student = Student::create($validated);
        if ($request->has('courses')) {
            $student->courses()->attach($request->courses);
        }

        return redirect()->route('std_home')->with('success', 'Student added successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $student = $this->studentRepository->getById($id);
        $courses = Course::all();
        return view('pages.students.edit', compact('student', 'courses'));
    }

    // Update student data
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'qualification' => 'required|string|max:255',
            'courses' => 'array'
        ]);

        $student = $this->studentRepository->update($id, $validated);
        $student->courses()->sync($request->courses);

        return redirect()->route('std_home')->with('success', 'Student updated successfully!');
    }

    // Delete student
    public function destroy($id)
    {
        $this->studentRepository->delete($id);
        return redirect()->route('std_home')->with('success', 'Student deleted successfully!');
    }
}
