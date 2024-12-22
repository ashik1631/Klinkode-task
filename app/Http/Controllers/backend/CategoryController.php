<?php

namespace App\Http\Controllers\backend;

use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return view('backend.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([

            'name' => 'required',
            'status' => 'required',
            'icon' => 'required|mimes:png,jpg,jpeg',
        ]);

        try {
            $data = $request->all();

            //image upload...
            $file = $request->file('icon');
            $extension = $file->getClientOriginalExtension();
            $photoName = time() . '.' . $extension;
            $file->move(public_path('uploads/category/'), $photoName);
            $data['icon'] = 'uploads/category/' . $photoName;
            //image uploadend

            category::create($data);
            //Message....

            Session::flash('type', 'success');
            Session::flash('message', 'success');

            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function edit(category $category)
    {
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        $request->validate([

            'name' => 'required',
            'status' => 'required',
            'icon' => 'nullable|mimes:png,jpg,jpeg',
        ]);

        $category->name = $request->name;
        $category->status = $request->status;
        $file = $request->file('icon');
        if (!empty($file)) {
            unlink(public_path($category->icon));
            $extension = $file->getClientOriginalExtension();
            $photoName = time() . '.' . $extension;
            $file->move(public_path('uploads/category/'), $photoName);
            $category->icon = 'uploads/category/' . $photoName;
        }
        $category->update();
        Session::flash('type', 'success');
        Session::flash('message', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        unlink(public_path($category->icon));
        $category->delete();
        Session::flash('message', 'data delete success');
        return redirect()->back();
    }
}
