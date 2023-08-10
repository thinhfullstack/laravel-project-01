<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    protected $courseModel;
    protected $categoryModel;

    public function __construct(Course $courseModel, Category $categoryModel)
    {
        $this->courseModel = $courseModel;
        $this->categoryModel = $categoryModel;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = $this->courseModel->all();

        return view('layouts.courses.index', [
            'title' => 'List Courses',
            'courses' => $courses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->categoryModel->all();

        return view('layouts.courses.form', [
            'title' => 'Create a new Courses',
            'categories' => $categories,
            'user_name' => Auth::user()->name,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        $inputs = $request->all();
        $inputs['created_by'] = Auth::user()->id;

        try {
            DB::beginTransaction();

            $course = $this->courseModel->create($inputs);

            $course->users()->attach($inputs['created_by']);
            
            DB::commit();

            $request->session()->flash('success', 'Create course successful!');
            
            return to_route('course.index');

        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = $this->categoryModel->all();

        return view('layouts.courses.form', [
            'course' => $this->courseModel->find($id),
            'title' => 'Edit a Course',
            'categories' => $categories,
            'user_name' => Auth::user()->name,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $inputs = $request->all();
        $inputs['created_by'] = Auth::user()->id;

        try {
            DB::beginTransaction();

            $course = $this->courseModel->find($id);

            if ($course) {
                $course->update($inputs);
            }

            $course->users()->attach($inputs['created_by']);

            DB::commit();

            $request->session()->flash('success', 'Updated course successful!');

            return to_route('course.index');

        } catch (\Exception $e) {
            DB::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();

            $course = $this->courseModel->find($id);

            if ($course) {
                $course->delete();
            }

            $course->users()->delete();
            $course->users()->detach(Auth::user()->id);

            DB::commit();

            return to_route('course.index');
        } catch (\Exception $e) {
            DB::rollback();
        }
    }
}
