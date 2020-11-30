<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\Models\Product;

Use App\Models\ShoppingCart;

use App\Http\Resources\ProductsCollection;

class ProductsController extends Controller
{
    //Seguridad de autenticacion 
    public function __construct(){
        $this->middleware('auth', ['except' =>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
    {
        

        //\Session::getdate($sessionName);
        // Muestra una colección del recurso
        $products = Product::paginate(15);

        //if($request->wantsJson()){
        //return new ProductsCollection($products);
        //  return $products->toJson();
        //return view('products.index',['products' =>])
       //}
        return view('products.index',['products' => $products]);
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mostramos un formulario para crear nuevos recursos
        $product = new Product;
        return view('products.create',["product" => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //almacena en la bd los nuevos recursos 
        $options = [
        'title' => $request->title,
        'description' => $request->description,
        'price' => $request->price
    ];
        //los datos con ID reciben parametros 
    if(Product::create($options)){
        return redirect('/productos');
    }else{
        return view('products.create');
    }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //muestraa un recurso 
        $product = Product::find($id);

        return view('products.show',['product' =>$product]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //muestra un formulario para editar
        $product = Product::find($id);
        //muestra la vista de products.edit
        return view("products.edit",["product"=> $product]); 
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
        //actualiza un recurso
        $product = Product::find($id);

        $product->title = $request->title;
        $product->price = $request->price;
        $product->description = $request->description;

        if ($product->save()) {
            return redirect('/');//redirecciona al home
        }else{
            return view("products.edit",["product" => $product]);
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //elimina el recurso 
        Product::destroy($id);
        return redirect('/productos');
    }
}
