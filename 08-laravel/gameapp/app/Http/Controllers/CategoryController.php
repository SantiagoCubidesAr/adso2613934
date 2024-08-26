<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$users = Category::all();
        $categories = Category::paginate(20);
        return view('categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        //dd($request->all());

        if($request->hasFile('image')) {
            $photo =time() . '.'.$request->image->extension();
            $request->image->move(public_path('images'), $photo);
        }

        $category = new Category;
            $category = new Category;
            $category->name = $request->name;
            $category->manufacturer = $request->manufacturer;
            $category->releasedate = $request->releasedate;
            $category->description = $request->description;
            $category->image = $photo;

        if ($category->save()) {
            return redirect('categories')->with('message', 'The user: '. $category->name. 'was successfully added');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $user)
    {
        //
    }
}
