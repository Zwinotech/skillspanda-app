<?php

namespace App\Http\Controllers;

use App\Models\CourseCategory;
use Illuminate\Http\Request;

class CourseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('courses.categories.index', [
            'categories' => CourseCategory::all()
        ]);
    }

    public function createCategory(Request $request)
    {
        $courseCategories = CourseCategory::where('parent_id', null)->orderby('name', 'asc')->get();

        if($request->method()=='GET')
        {
            return view('courses.categories.create', compact('courseCategories'));
        }
        if($request->method()=='POST')
        {
            $validator = $request->validate([
                'name'      => 'required',
                'slug'      => 'required|unique:course_categories',
                'parent_id' => 'nullable|numeric'
            ]);

            CourseCategory::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'parent_id' =>$request->parent_id
            ]);

            return redirect()->back()->with('success', 'Category has been created successfully.');
        }
    }
}
