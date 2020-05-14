<?php

namespace App\Http\Controllers;

use App\Category;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        abort_if(Gate::denies('category-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $oldName = $category->name;

        $validatedData = $this->validate($request, [
            'name' => 'required|unique:categories,name|string|max:30',
        ]);

        $category->update($validatedData);
        return back()->with('success', "{$oldName} updated to {$category->name} successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        abort_if(Gate::denies('category-destroy'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $category->delete();
        return back()->with('success', "{$category->name} successfully Deleted");

    }

    public function manageCategory()
    {
        $categories = Category::where('parent_id', '=', null)->get();
        $allCategories = Category::pluck('name', 'id')->all();

        return view('categories.categoryTreeview', compact('categories', 'allCategories'));
    }

    public function addCategory(Request $request)
    {
        abort_if(Gate::denies('category-create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->validate($request, [
            'name' => 'required|unique:categories,name|string|max:30',
        ]);
        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? null : $input['parent_id'];

        Category::create($input);
        return back()->with('success', 'New Category added successfully.');
    }
}
