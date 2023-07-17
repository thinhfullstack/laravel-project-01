<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $students;

    public function __construct()
    {
        $this->students = [
            [
                'id' => 1,
                'name' => 'Student 01'
            ],
            [
                'id' => 2,
                'name' => 'Student 02'
            ],
            [
                'id' => 3,
                'name' => 'Student 03'
            ],
        ];
    }
    public function index()
    {
        return view('students.index', [
            'students' => $this->students,
        ]);
    }

    public function show($id)
    {
        $studentInfo = null;

        foreach($this->students as $student) {
            if($student['id'] == $id) {
                $studentInfo = $student;
                break;
            }
        }

        if($studentInfo) {
            return view('students.show', [
                'student' => $studentInfo
            ]);
        }else {
            return "Sinh viên không tồn tại";
        }
    }
}
