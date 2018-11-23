<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Camera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class CameraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $cameras = Camera::paginate(5);
        $keyword = $request->get('name');
        if ($keyword) {
            $cameras = Camera::where("name", "LIKE", "%$keyword%")->paginate(5);
        }
        return view('camera.index', compact('cameras'));
    }

    public function searchResults(Request $request)
    {
        $camera = Camera::paginate(5);
        $brands = Brand::take(6)->get();
        $keyword = $request->get('name');
        if ($keyword) {
            $camera = Camera::where("name","LIKE","%$keyword%")->paginate(4);
        }
        return view('search',compact('camera','brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('camera.create');
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
        $datas['slug'] = $request->name;
        $datas['created_by'] = Auth::user()->id;
        if ($request->file('photo')) {
            $file = Storage::disk('public')->put('cameras', $request->photo);
            $datas['photo'] = $file;
        }
        $cameras = Camera::create($datas);
        $cameras->categories()->attach($request->get('categories'));
        return redirect(route('camera.create'))->with('status', 'mantap');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $camera = Camera::findOrFail($id);
        return view('camera.show', compact('camera'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $camera = Camera::findOrFail($id);
        return view('camera.edit', compact('camera'));
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
        $camera = Camera::findOrFail($id);
        $data = $request->all();
        $data['slug'] = $request->name;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo')->store('cameras', 'public');
            $data['photo'] = $file;
            Storage::delete('public' . $camera->photo);
        }
        $camera->update($data);
        $camera->categories()->sync($request->get('categories'));
        return redirect(route('camera.edit', ['id' => $camera->id]))->with('status', 'mantul update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $camera = Camera::findOrFail($id);
        $camera->delete();
        return redirect(route('camera.index'))->with('status', 'Camera moved to trash');
    }

    public function trash()
    {
        $cameras = Camera::onlyTrashed()->paginate(5);
        return view('camera.trash', compact('cameras'));
    }

    public function restore($id)
    {
        $camera = Camera::withTrashed()->findOrFail($id);
        if ($camera->trashed()) {
            $camera->restore();
            return redirect(route('camera.trash'))->with('status', 'camera successfully restored');
        } else {
            return redirect(route('camera.trash'))->with('status', 'camera is not in trash');
        }
    }

    public function deletePermanent($id)
    {
        $camera = Camera::withTrashed()->findOrFail($id);
        if (!$camera->trashed()) {
            return redirect(route('camera.trash'))->with('status', 'camera is not in trash ')->with('status_type', 'alert');
        } else {
            $camera->categories()->detach();
            $camera->brands()->detach();
            $camera->forceDelete();
            return redirect(route('camera.trash'))->with('status', 'camera permanently deleted');
        }
    }

    public function showCatalog()
    {
        $brands = Brand::take(6)->get();
        $camera = Camera::all();
        return view('catalog', compact('brands', 'camera'));
    }

    public function showData($id)
    {
        $camera = Camera::findOrFail($id);
        return view('item', compact('camera'));
    }

}
