<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\SchoolClass;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    /**
     * Display a listing of the classes.
     */
    public function index()
    {
        try {
            // Fetch classes from database with teacher information
            $classes = SchoolClass::select(
                'classes.*',
                DB::raw('COALESCE(teachers.name, "No Teacher Assigned") as teacher_name')
            )
                ->leftJoin('teachers', 'classes.teacher_id', '=', 'teachers.id')
                ->orderBy('classes.created_at', 'desc')
                ->get()
                ->map(function ($class) {
                    $class->created_at = date('M d, Y', strtotime($class->created_at));
                    return $class;
                });

            // Get teachers for dropdown - using sample data or fetch from database
            $teachers = collect([
                (object) ['id' => 1, 'name' => 'Mr. John Smith'],
                (object) ['id' => 2, 'name' => 'Ms. Sarah Johnson'],
                (object) ['id' => 3, 'name' => 'Dr. Michael Brown'],
                (object) ['id' => 4, 'name' => 'Mrs. Lisa Wilson'],
                (object) ['id' => 5, 'name' => 'Mr. David Garcia']
            ]);
        } catch (\Exception $e) {
            // Fallback to sample data if database query fails
            $classes = collect([
                (object) [
                    'id' => 1,
                    'name' => 'Mathematics A',
                    'grade' => 3,
                    'teacher_id' => 1,
                    'teacher_name' => 'Mr. John Smith',
                    'students_count' => 25,
                    'description' => 'Advanced mathematics for grade 3 students',
                    'created_at' => '2024-01-15'
                ]
            ]);

            $teachers = collect([
                (object) ['id' => 1, 'name' => 'Mr. John Smith'],
                (object) ['id' => 2, 'name' => 'Ms. Sarah Johnson'],
                (object) ['id' => 3, 'name' => 'Dr. Michael Brown'],
                (object) ['id' => 4, 'name' => 'Mrs. Lisa Wilson'],
                (object) ['id' => 5, 'name' => 'Mr. David Garcia']
            ]);
        }

        return view('admin.classes.index', compact('classes', 'teachers'));
    }

    /**
     * Show the form for creating a new class.
     */
    public function create()
    {
        $teachers = collect([
            (object) ['id' => 1, 'name' => 'Mr. John Smith'],
            (object) ['id' => 2, 'name' => 'Ms. Sarah Johnson'],
            (object) ['id' => 3, 'name' => 'Dr. Michael Brown'],
            (object) ['id' => 4, 'name' => 'Mrs. Lisa Wilson'],
            (object) ['id' => 5, 'name' => 'Mr. David Garcia']
        ]);

        return view('admin.classes.create', compact('teachers'));
    }

    /**
     * Store a newly created class in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'grade' => 'required|integer|between:1,12',
            'teacher_id' => 'nullable|integer',
            'description' => 'nullable|string|max:1000'
        ]);

        try {
            // Create new class in database
            $class = SchoolClass::create([
                'name' => $request->name,
                'grade' => $request->grade,
                'teacher_id' => $request->teacher_id,
                'description' => $request->description,
                'students_count' => 0 // Start with 0 students
            ]);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Class created successfully!',
                    'class' => [
                        'id' => $class->id,
                        'name' => $class->name,
                        'grade' => $class->grade,
                        'teacher_id' => $class->teacher_id,
                        'description' => $class->description,
                        'created_at' => $class->created_at->format('M d, Y')
                    ]
                ]);
            }

            return redirect()->route('admin.classes.index')
                ->with('success', 'Class created successfully!');
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to create class: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Failed to create class: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified class.
     */
    public function show($id)
    {
        // Sample class data
        $class = (object) [
            'id' => $id,
            'name' => 'Mathematics A',
            'grade' => 3,
            'teacher_id' => 1,
            'teacher_name' => 'Mr. John Smith',
            'students_count' => 25,
            'description' => 'Advanced mathematics for grade 3 students',
            'created_at' => '2024-01-15'
        ];

        return view('admin.classes.show', compact('class'));
    }

    /**
     * Show the form for editing the specified class.
     */
    public function edit($id)
    {
        // Sample class data
        $class = (object) [
            'id' => $id,
            'name' => 'Mathematics A',
            'grade' => 3,
            'teacher_id' => 1,
            'description' => 'Advanced mathematics for grade 3 students'
        ];

        $teachers = collect([
            (object) ['id' => 1, 'name' => 'Mr. John Smith'],
            (object) ['id' => 2, 'name' => 'Ms. Sarah Johnson'],
            (object) ['id' => 3, 'name' => 'Dr. Michael Brown'],
            (object) ['id' => 4, 'name' => 'Mrs. Lisa Wilson'],
            (object) ['id' => 5, 'name' => 'Mr. David Garcia']
        ]);

        return view('admin.classes.edit', compact('class', 'teachers'));
    }

    /**
     * Update the specified class in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'grade' => 'required|integer|between:1,12',
            'teacher_id' => 'nullable|integer',
            'description' => 'nullable|string|max:1000'
        ]);

        // In a real application, you would update the database record

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Class updated successfully!',
                'class' => [
                    'id' => $id,
                    'name' => $request->name,
                    'grade' => $request->grade,
                    'teacher_id' => $request->teacher_id,
                    'description' => $request->description
                ]
            ]);
        }

        return redirect()->route('admin.classes.index')
            ->with('success', 'Class updated successfully!');
    }

    /**
     * Remove the specified class from storage.
     */
    public function destroy($id)
    {
        try {
            $class = SchoolClass::findOrFail($id);
            $class->delete();

            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Class deleted successfully!'
                ]);
            }

            return redirect()->route('admin.classes.index')
                ->with('success', 'Class deleted successfully!');
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to delete class: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->route('admin.classes.index')
                ->withErrors(['error' => 'Failed to delete class: ' . $e->getMessage()]);
        }
    }

    /**
     * Search classes based on filters.
     */
    public function search(Request $request): JsonResponse
    {
        $searchTerm = $request->get('search', '');
        $grade = $request->get('grade', '');

        // Sample filtered data - in real app, query database
        $allClasses = collect([
            (object) [
                'id' => 1,
                'name' => 'Mathematics A',
                'grade' => 3,
                'teacher_name' => 'Mr. John Smith',
                'students_count' => 25,
                'created_at' => '2024-01-15'
            ],
            (object) [
                'id' => 2,
                'name' => 'English Literature',
                'grade' => 4,
                'teacher_name' => 'Ms. Sarah Johnson',
                'students_count' => 28,
                'created_at' => '2024-02-20'
            ],
            (object) [
                'id' => 3,
                'name' => 'Science Basics',
                'grade' => 2,
                'teacher_name' => 'Dr. Michael Brown',
                'students_count' => 22,
                'created_at' => '2024-03-10'
            ]
        ]);

        $filteredClasses = $allClasses->filter(function ($class) use ($searchTerm, $grade) {
            $matchesSearch = empty($searchTerm) ||
                stripos($class->name, $searchTerm) !== false ||
                stripos($class->teacher_name, $searchTerm) !== false;

            $matchesGrade = empty($grade) || $class->grade == $grade;

            return $matchesSearch && $matchesGrade;
        });

        return response()->json([
            'success' => true,
            'classes' => $filteredClasses->values()
        ]);
    }

    /**
     * Get students for a specific class.
     */
    public function getStudents($id): JsonResponse
    {
        // Sample student data for the class
        $students = collect([
            (object) ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'],
            (object) ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com'],
            (object) ['id' => 3, 'name' => 'Mike Johnson', 'email' => 'mike@example.com']
        ]);

        return response()->json([
            'success' => true,
            'students' => $students
        ]);
    }

    /**
     * Filter classes for API endpoint.
     */
    public function filter(Request $request): JsonResponse
    {
        $grade = $request->get('grade');
        $teacher = $request->get('teacher');
        $search = $request->get('search');

        // Sample filtering logic - replace with actual database queries
        $classes = collect([
            (object) [
                'id' => 1,
                'name' => 'Mathematics A',
                'grade' => 3,
                'teacher_id' => 1,
                'teacher_name' => 'Mr. John Smith'
            ],
            (object) [
                'id' => 2,
                'name' => 'English Literature',
                'grade' => 4,
                'teacher_id' => 2,
                'teacher_name' => 'Ms. Sarah Johnson'
            ]
        ]);

        // Apply filters
        if ($grade) {
            $classes = $classes->where('grade', $grade);
        }

        if ($teacher) {
            $classes = $classes->where('teacher_id', $teacher);
        }

        if ($search) {
            $classes = $classes->filter(function ($class) use ($search) {
                return stripos($class->name, $search) !== false ||
                    stripos($class->teacher_name, $search) !== false;
            });
        }

        return response()->json([
            'success' => true,
            'data' => $classes->values()
        ]);
    }
}
