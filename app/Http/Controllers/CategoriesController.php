<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        // passing through associative array to loop over in our UI 
        return view('categories.index', compact('categories'));
    }


    public function create()
    {
        return view('categories.create');
    }


    public function store(CategoryRequest $request)
    {


        $category = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        if ($request->hasFile('image_path')) {
            $category['image_path'] = time() . '-' . $request->name . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('images'), $category['image_path']);
        }

        $category = Category::create($category);
        return redirect()->back()->with('status', 'Categories Info Added Successfully');
    }


    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }


    public function update(CategoryRequest $request, $id)
    {
        $category = [
            'name' => $request->name,
            'description' => $request->description
        ];

        if ($request->hasFile('image_path')) {
            $category['image_path'] = time() . '-' . $request->name . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('images'), $category['image_path']);
        }

        Category::where('id', $id)->update($category);

        return redirect()->back()->with('status', 'Categories Info Updated Successfully');
    }

    public function destory($id)
    {
        $category = Category::find($id);
        $destination = 'images/' . $category->image_path;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $category->delete();
        return redirect()->back()->with('status', 'Categories Info Deleted Successfully Successfully');
    }
}
