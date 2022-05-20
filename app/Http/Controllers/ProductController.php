<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;

class ProductController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products = products::paginate( 5 );

        return view( "products.index", compact( "products" ) )->with( request()->input( "page" ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( "products.create" );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        // Validate Inputs
        $request->validate( [
            "name" => "required",
            "detail" => "required",
        ] );
        // Create New Product in database
        products::create( $request->all() );
        // Redirect and Meassage
        return redirect()->route( "products.index" )->with( "success", "Product Created Successfuly !" );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products        $products
     * @return \Illuminate\Http\Response
     */
    public function show( products $product ) {

        return view( "products.show", compact( "product" ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products        $products
     * @return \Illuminate\Http\Response
     */
    public function edit( products $product ) {
        return view( 'products.edit', compact( "product" ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @param  \App\Models\products        $products
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, products $product ) {
        // Validate Inputs
        $request->validate( [
            "name" => "required",
            "detail" => "required",
        ] );
        // Create New Product in database
        $product->update( $request->all() );
        // Redirect and Meassage
        return redirect()->route( "products.index" )->with( "success", "Product Updated Successfuly !" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products        $products
     * @return \Illuminate\Http\Response
     */
    public function destroy( products $product ) {
        $product->delete();
        return redirect()->route( "products.index" )->with( "success", "Product Deleted Successfuly !" );
    }
}
