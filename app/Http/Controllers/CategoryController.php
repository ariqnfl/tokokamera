<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::paginate(5);
        $keyword = $request->get('name');
        if ($keyword) {
            $categories = Category::where("name","LIKE","%$keyword%")->paginate(5);
        }
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datas = $request->all();
        $datas['created_by'] = Auth::user()->id;
        $categories = Category::create($datas);
        return redirect()->route('category.create')->with('status', 'Category Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $datas = $request->all();
        $category->update($datas);
        return redirect()->route('category.edit', compact('id'))->with('status', 'Category Successfully Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')->with('status', 'Category successfully moved into trash');
    }

    public function trash()
    {
        $categories = Category::onlyTrashed()->paginate(5);
        return view('category.trash', compact('categories'));
    }

    public function restore($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        if ($category->trashed()) {
            $category->restore();
        } else {
            return redirect()->route('category.index')->with('status', 'Category is not in trash');
        }
        return redirect()->route('category.index')->with('status', 'Category successfully restored');
    }

    public function deletePermanent($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        if (!$category->trashed()) {
            return redirect()->route('category.index')
                ->with('status', 'Can not delete permanent active category');
        } else {
            $category->forceDelete();
            return redirect()->route('category.index')
                ->with('status', 'Category permanently deleted');
        }
    }

    public function ajaxSearch(Request $request)
    {
        $keyword = $request->get('q');
        $categories = Category::where("name", "LIKE", "%$keyword%")->get();
        return $categories;
    }
}
