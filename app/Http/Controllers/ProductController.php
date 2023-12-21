<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Product;
use App\Models\Category;
use App\Mail\ContactMail;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ProductController;
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
        $tags = tag::all();
     
        return view('products.create', compact('categories', 'tags'));
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
       'category_id'=>$request->category
    ]);
    
    $product->tags()->attach($request->tags);

    return redirect()->route('products.create')->with('message', 'Hai inserito correttamente il tuo articolo');
}


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
    return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
      $categories = Category::all();
      $tags = Tag::all();

        return view('products.edit',compact('product', 'categories','tags'));
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
    
         $product->tags()->sync($request->tags);
         return redirect(route('products.index'))->with('message', 'Hai modificato il tuo articolo');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        
       if($product->tags){
        $product->tags()->detach($product->tags);

       }
        $product->delete();

        return redirect(route('homepage'))->with('message','Hai cancellato il tuo articolo');
    }

    public function contactUs(){
        
        return view('contactUs');
   }

  
   public function submit(Request $request){

   $email = $request->input('email');
   $username = $request->input('username');
   $description =$request->input('description');

        Mail::to('hack99@email.it')->send(new ContactMail($email, $username, $description));

    return redirect(route('homepage'));
}

   
}
