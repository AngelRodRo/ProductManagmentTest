<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $products =  $this->getProducts();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {




    }

    public function getProducts(){
        $products = json_decode(file_get_contents(storage_path()."/app/products.json"));
        return $products;        
    }

    public function saveProduct($product){
        $products = $this->getProducts();
        $product["id"] = sizeof($products);
        $products[] = $product;


        file_put_contents(storage_path()."/app/products.json", json_encode($products));

        $xml = new SimpleXMLElement('<root/>');
        array_walk_recursive($products, array ($xml, 'addChild'));

        file_put_contents(storage_path()."/app/products.xml", $xml->asXML());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $data = $req->all();
        $this->validate($req,[
            'name' => 'required',
            'quantity'=>'required',
            'price' => 'required'
        ]);

        $product = array();
        $product["name"] = $data["name"];
        $product["quantity"]= $data["quantity"];
        $product["price"] = $data["price"];
        $product["total"] = $data["quantity"] * $data["price"];
        $this->saveProduct($product);

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
