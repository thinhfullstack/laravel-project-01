<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    protected function studentData()
    {
        $students = [
            [
                'id' => 1,
                'name' => 'Student 01',
            ],
            [
                'id' => 2,
                'name' => 'Student 02',
            ],
            [
                'id' => 3,
                'name' => 'Student 03',
            ],
        ];

        return $students;
    }

    public function index()
    {
        return view('students.index', [
            'students' => $this->studentData(),
        ]);
    }

    public function show($id)
    {
        $studentInfo = null;
        $students = $this->studentData();

        foreach ($students as $student) {
            if ($student['id'] == $id) {
                $studentInfo = $student;
                break;
            }
        }

        if ($studentInfo) {
            return view('students.show', [
                'student' => $studentInfo,
            ]);
        } else {
            return 'Sinh viên không tồn tại';
        }
    }
}
