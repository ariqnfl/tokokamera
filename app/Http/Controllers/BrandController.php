<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $brands = Brand::paginate(5);
        $keyword = $request->get('name');
        if ($keyword) {
            $brands = Brand::where("name", "LIKE", "%$keyword%")->paginate(5);
        }
        return view('brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
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
        if ($request->file('photo')) {
            $file = Storage::disk('public')->put('brands', $request->photo);
            $datas['photo'] = $file;
        }
        Brand::create($datas);
        return redirect()->route('brand.create')->with('status', 'Brand Successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::findOrFail($id);
        return view('brand.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('brand.edit', compact('brand'));
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
        $brand = Brand::findOrFail($id);
        $datas = $request->all();
        if ($request->hasFile('photo')) {
            $file = $request->file('photo')->store('brands', 'public');
            $datas['photo'] = $file;
            Storage::delete('public/' . $brand->photo);
        }
        $brand->update($datas);
        return redirect()->route('brand.edit', compact('id'))->with('status', 'brand successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()->route('brand.index')->with('status', 'Brand Successfully deleted');
    }

    public function trash(Request $request)
    {
        $brands = Brand::onlyTrashed()->paginate(5);
        $keyword = $request->get('name');
        if ($keyword){
            $brands = Brand::where('name',"LIKE","%$keyword","AND",'deleted_at',"IS","NOT","NULL")->paginate(5);
        }
        return view('brand.trash', compact('brands'));
    }

    public function restore($id)
    {
        $brand = Brand::withTrashed()->findOrFail($id);
        if ($brand->trashed()) {
            $brand->restore();
        } else {
            return redirect()->route('brand.index')->with('status', 'Brand is not in trash');
        }
        return redirect(route('brand.index'))->with('status', 'brand is successfully restored');
    }

    public function deletePermanent($id)
    {
        $brand = Brand::withTrashed()->findOrFail($id);
        if (!$brand->trashed()) {
            return redirect(route('brand.index'))->with('status', 'can not delete permanent active brand');
        } else {
            $brand->forceDelete();
            return redirect(route('brand.index'))->with('status', 'brand permanently deleted');
        }
    }

    public function ajaxSearch(Request $request)
    {
        $keyword = $request->get('q');
        $brand = Brand::where('name', 'LIKE', "%$keyword%")->get();
        return $brand;
    }
}
