<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Category;
use App\CategoryStock;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{

    public function updateCategoryStock($asset, $categoryStock)
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::all();

        foreach ($categories as $category) {
            $categoryStock = CategoryStock::where('category_id', $category->id)->get()->first();
            $assets = Asset::where('category_id', $category->id)->get();

            $categoryStock->total = count($assets);
            $categoryStock->available = 0;
            $categoryStock->allocated = 0;
            $categoryStock->reserved = 0;
            $categoryStock->for_diagnosis = 0;
            $categoryStock->for_repair = 0;

            foreach ($assets as $asset) {

                switch ($asset->asset_status_id) {
                    case 1:
                        $categoryStock->available++;
                        break;

                    case 2:
                        $categoryStock->allocated++;
                        break;

                    case 3:
                        $categoryStock->reserved++;
                        break;

                    case 4:
                        $categoryStock->for_diagnosis++;
                        break;

                    case 5:
                        $categoryStock->for_repair++;
                        break;

                }
            }
            $categoryStock->update();
        }

        return redirect('/category-tree-view');
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
        return back()->with('success', "{$category->name} successfully deleted");

    }

    /*-----------------------
    | Category View
    |----------------------*/

    public function manageCategory()
    {
        $categories = Category::all();
        $selectCategories = Category::all()->pluck('name', 'id');

        return view('categories.categoryTreeview')->with('categories', $categories)->with('selectCategories', $selectCategories);
    }

    /*-----------------------
    | ADD Category
    |----------------------*/

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

    /*-----------------------
    | SOFTDELETED
    |----------------------*/

    public function softDeleted(Request $request)
    {
        abort_if(Gate::denies('category-create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = $request->user();
        $categories = Category::onlyTrashed()->get();

        return view('categories.categorysoft')->with('categories', $categories);
    }

    /*-----------------------
    | RESTORE
    |----------------------*/
    public function restore($category)
    {

        abort_if(Gate::denies('category-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Category::withTrashed()->find($category)->restore();
        return back()->with('success', 'Restored successfully.');
    }

    /*-----------------------
    | RESTORE ALL
    |----------------------*/

    public function restoreAll()
    {

        abort_if(Gate::denies('category-edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Category::onlyTrashed()->restore();
        return back()->with('success', 'Restored all successfully');
    }

}
