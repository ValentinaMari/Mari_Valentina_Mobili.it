<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductCreateRequest;

class ProductController extends Controller
{


    public function __construct()
{

     $this->middleware('auth')->except('index','show');
}





    /**
     * 
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = product::all();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all();
     
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request)
    {
        
     $product = Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
        'img' => $request->file('img')->store('public/images'),
        'user_id' => Auth::id(),
        'category_id' => $request->category

     ]);

     return redirect(route('products.create'))->with('message','Hai inserito correttamente il tuo artcolo');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
      $categories = Category::all();

        return view('products.edit',compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        
        if($request->file('img')){
            $img = $request->file('img')->store('public/images');

        }
        else{
           
            $img = $product->img;
        }


        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'img' => $img,
            'user_id' => Auth::id(),
            'category_id' => $request->category
    
         ]);
    
         return redirect(route('products.index'))->with('message', 'Hai modificato il tuo artcolo');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect(route('homepage'))->with('message','Hai cancellato il tuo articolo');
    }
}
