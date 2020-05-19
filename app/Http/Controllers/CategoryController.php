<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

use Intervention\Image\Facades\Image;


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
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required',
            'afbeelding' => 'required|image|mimes:jpeg,jpg,gif,png,svg',
        ]);
        $category = new Category;
        $category->name = ucfirst($request->input('naam'));
        if ($request->hasFile('afbeelding')) {
            $file = $request->file('afbeelding');
            $name = time().'.'.$file->getClientOriginalExtension();
            $img = Image::make($file->getRealPath())->resize(370,278);
            $destinationPath = public_path('/categories');
            $img->save($destinationPath.'/'.$name,100);
            $category->image = 'categories/' . $name;
        }
        $category->save();

        return redirect("/");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('categories.edit')
            ->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'afbeelding' => 'image',
        ]);

        $category = Category::find($id);
        $category->name = ucfirst($request->input('naam'));
        if ($request->hasFile('afbeelding')) {
            $file = $request->file('afbeelding');
            $name = time().'.'.$file->getClientOriginalExtension();
            $img = Image::make($file->getRealPath())->resize(370,278);
            $destinationPath = public_path('/categories');
            $img->save($destinationPath.'/'.$name,100);
            $category->image = 'categories/' . $name;
        }
        $category->save();

        return redirect("/");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        unlink(public_path() .'/'. $category->image);
        $category->delete();

        return redirect('/');
    }
}
