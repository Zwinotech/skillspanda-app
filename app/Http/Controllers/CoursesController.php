<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('courses.index', [
            'courses' => Course::with('course_category_id')->paginate(50)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CourseCategory::all();

        return view('courses.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = 'Published';

        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('courses', 'slug')],
            'description' => 'required',
            'details' => 'nullable|string',
            'course_category_id' => ['required', Rule::exists('course_categories', 'id')],
            'difficulty' => 'nullable|string',
            'graphic' => 'required|image',
            'video' => 'nullable|url',
            'runtime' => 'nullable|string',
            'brochure' => 'nullable|mimes:pdf,xlx,csv|max:2048',
            'price' => 'required',
            'status' => '$status'
        ]);

        $attributes['facilitator_id'] = Auth::id();
        $attributes['graphic'] = request()->file('graphic')->store('uploads/graphics');
        $attributes['brochure'] = request()->file('brochure')?->store('uploads/documents');

        Course::create($attributes);

        return redirect('/courses')->with('Success', 'Course has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit(Course $course)
    {
        return view('courses.edit', ['course' => $course]);
    }

    public function update(Course $course)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('courses', 'slug')->ignore($course->id)],
            'description' => 'required',
            'details' => 'nullable|string',
            'course_category_id' => ['required', Rule::exists('course_categories', 'id')],
            'difficulty' => 'nullable|string',
            'graphic' => 'image',
            'video' => 'nullable|url',
            'runtime' => 'nullable|string',
            'brochure' => 'nullable|mimes:pdf,xlx,csv|max:2048',
            'price' => 'required',
        ]);

        if (isset($attributes['graphic'])) {
            $attributes['graphic'] = request()->file('graphic')->store('graphics');
        }

        if (isset($attributes['brochure'])) {
            $attributes['brochure'] = request()->file('brochure')?->store('brochure');
        }

        $course->update($attributes);

//        $attributes['facilitator_id'] = Auth::id();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
