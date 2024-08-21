<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

        if($request->hasFile('photo')) {
            $photo =time() . '.'.$request->photo->extension();
            $request->photo->move(public_path('images'), $photo);
        }

        $user = new User;
            $user = new User;
            $user->document = $request->document;
            $user->fullname = $request->fullname;
            $user->gender = $request->gender;
            $user->birthdate = $request->birthdate;
            $user->photo = $photo;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);

        if ($user->save()) {
            return redirect('users')->with('message', 'The user: '. $user->fullname. 'was successfully added');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $user)
    {
        //
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
