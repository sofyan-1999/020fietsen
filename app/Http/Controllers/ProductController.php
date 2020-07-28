<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Picture;

use DB;
use Intervention\Image\Facades\Image;
use Storage;

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
            'afbeelding' => 'required',
            'afbeelding.*' => 'image',
        ]);

        $product = new Product;
        $product->title = ucfirst($request->input('titel'));
        $product->condition = $request->input('conditie');
        $product->stock = $request->input('stock');
        $product->description = ucfirst($request->input('beschrijving'));
        $product->price = $request->input('prijs');
        if($request->input('opHomePagina') == null){
            $product->home = 0;
        }
        else{
            $product->home = $request->input('opHomePagina');
        }
        $product->category_id = $request->input('category');



        $image =  new Picture;
        if ($request->hasFile('afbeelding')) {
            $files = $request->file('afbeelding');
            for ($i = 0; $i <= 2; $i++) {
                if($i == 0){
                    $name = time().'.'.$files[0]->getClientOriginalExtension();
                    $img = Image::make($files[0]->getRealPath())->resize(370,278);
                    $img->save(storage_path('app/public').'/bicycles/'.$name,100);
                    $nameOrignalImage = time().'_1.'.$files[0]->getClientOriginalExtension();
                    Storage::putFileAs(
                        'bicycles', $files[0], $nameOrignalImage
                    );
                    $image->first_original_image = 'bicycles/' . $nameOrignalImage;
                    $image->first_resized_image = 'bicycles/' . $name;
                }
                else{
                    if($i == 1){
                        $nameOrignalImage = time().'_2.'.$files[1]->getClientOriginalExtension();
                        Storage::putFileAs(
                            'bicycles', $files[1], $nameOrignalImage
                        );
                        $image->second_original_image = 'bicycles/' . $nameOrignalImage;
                    }
                    else{
                        $nameOrignalImage = time().'_3.'.$files[2]->getClientOriginalExtension();
                        Storage::putFileAs(
                            'bicycles', $files[2], $nameOrignalImage
                        );
                        $image->third_original_image = 'bicycles/' . $nameOrignalImage;
                    }

                }
            }
        }

        $image->save();
        $product->image_id = $image->id;
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
        $products = DB::table('products')
            ->join('images', 'products.image_id', '=', 'images.id')
            ->select('products.id', 'products.title', 'products.price', 'images.first_resized_image')
            ->where('products.category_id', '=', $id)
            ->orderBy('products.price', 'asc')
            ->paginate(15);

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
            'afbeelding.*' => 'image',
        ]);

        $product = Product::find($id);
        $product->title = ucfirst($request->input('titel'));
        $product->stock = $request->input('stock');
        $product->condition = $request->input('conditie');
        $product->description = ucfirst($request->input('beschrijving'));
        $product->price = $request->input('prijs');
        if($request->input('opHomePagina') == null){
            $product->home = 0;
        }
        else{
            $product->home = $request->input('opHomePagina');
        }
        $product->category_id = $request->input('category');




        $image =  Picture::find($product->image_id);
        if ($request->hasFile('afbeelding')) {
            $files = $request->file('afbeelding');
            for ($i = 0; $i <= 2; $i++) {
                if($i == 0){
                    $name = time().'.'.$files[0]->getClientOriginalExtension();
                    $img = Image::make($files[0]->getRealPath())->resize(370,278);
                    $img->save(storage_path('app/public').'/bicycles/'.$name,100);
                    $nameOrignalImage = time().'_1.'.$files[0]->getClientOriginalExtension();
                    Storage::putFileAs(
                        'bicycles', $files[0], $nameOrignalImage
                    );
                    $image->first_original_image = 'bicycles/' . $nameOrignalImage;
                    $image->first_resized_image = 'bicycles/' . $name;
                }
                else{
                    if($i == 1){
                        $nameOrignalImage = time().'_2.'.$files[1]->getClientOriginalExtension();
                        Storage::putFileAs(
                            'bicycles', $files[1], $nameOrignalImage
                        );
                        $image->second_original_image = 'bicycles/' . $nameOrignalImage;
                    }
                    else{
                        $nameOrignalImage = time().'_3.'.$files[2]->getClientOriginalExtension();
                        Storage::putFileAs(
                            'bicycles', $files[2], $nameOrignalImage
                        );
                        $image->third_original_image = 'bicycles/' . $nameOrignalImage;
                    }

                }
            }
        }





        $image->save();
        $product->image_id = $image->id;
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
        $product->delete();

        return redirect('/');
    }

    public function product($id)
    {

        $product = DB::table('products')
            ->join('images', 'products.image_id', '=', 'images.id')
            ->select('products.*', 'images.first_original_image', 'images.second_original_image', 'images.third_original_image')
            ->where('products.id', '=', $id)
            ->get();

        // show the edit form and pass the nerd
        return view('products.product')
            ->with('product', $product);
    }
}
