<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use DB;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show','product']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')->paginate(15);

        return view('products.index')
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
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
            'titel' => 'required',
            'stock' => 'required',
            'conditie' => 'required',
            'beschrijving' => 'required',
            'prijs' => 'required|regex:/^\d*(\,\d{2})?$/|not_in:0',
            'category' => 'required',
            'afbeelding' => 'required|image',
        ]);

        $product = new Product;
        $product->title = ucfirst($request->input('titel'));
        $product->condition = $request->input('conditie');
        $product->stock = $request->input('stock');
        $product->description = ucfirst($request->input('beschrijving'));
        $product->price = $request->input('prijs');
        if ($request->hasFile('afbeelding')) {
            $file = $request->file('afbeelding');
            $name = time().'.'.$file->getClientOriginalExtension();
            $img = Image::make($file->getRealPath())->resize(370,278);
            $destinationPath = public_path('/bicycles');
            $img->save($destinationPath.'/'.$name,100);
            $product->image = 'bicycles/' . $name;
        }
        if($request->input('opHomePagina') == null){
            $product->home = 0;
        }
        else{
            $product->home = $request->input('opHomePagina');
        }
        $product->category_id = $request->input('category');
        $product->save();

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
        $products = DB::table('products')->where('category_id', '=', $id)->paginate(15);

        // show the edit form and pass the nerd
        return view('products.show')
            ->with('products', $products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the nerd
        $product = Product::find($id);

        // show the edit form and pass the nerd
        return view('products.edit')
            ->with('product', $product);
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
            'prijs' => 'regex:/^\d*(\,\d{2})?$/|not_in:0',
            'stock' => 'required',
            'afbeelding' => 'image',
        ]);

        $product = Product::find($id);
        $product->title = ucfirst($request->input('titel'));
        $product->stock = $request->input('stock');
        $product->condition = $request->input('conditie');
        $product->description = ucfirst($request->input('beschrijving'));
        $product->price = $request->input('prijs');
        if ($request->hasFile('afbeelding')) {
            $file = $request->file('afbeelding');
            $name = time().'.'.$file->getClientOriginalExtension();
            $img = Image::make($file->getRealPath())->resize(370,278);
            $destinationPath = public_path('/bicycles');
            $img->save($destinationPath.'/'.$name,100);
            $product->image = 'bicycles/' . $name;
        }
        if($request->input('opHomePagina') == null){
            $product->home = 0;
        }
        else{
            $product->home = $request->input('opHomePagina');
        }
        $product->category_id = $request->input('category');
        $product->save();

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
        // delete
        $product = Product::find($id);
        unlink(public_path() .'/'. $product->image);
        $product->delete();

        return redirect('/');
    }

    public function product($id)
    {
        $product = Product::find($id);

        // show the edit form and pass the nerd
        return view('products.product')
            ->with('product', $product);
    }
}
