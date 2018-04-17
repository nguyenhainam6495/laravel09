<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
	// public $product;
	// public function __construct(){
	// 	$this->product = new Product();
	// }
	/**
	 * Hàm trả về danh sách product
	 * @return views
	 */
    public function index(){
    	$products = Product::getAll();
    	$name = "Zent Group";

    	return view('products.index',[
	    	'products' => $products,
	    	'name' => $name,

    	]); // cách truyền khác: compact('products')
    }

    public function destroy($id){

    	$product = new Product();
    	$product->del($id);

    	return redirect()->back();
    }

    /**
     * save database
     * @return [type] [description]
     */
    public function store(Request $request){

        // Product::storeData($request->all());
        $products =Product::create($request->only(['name','price'])); // lấy chỉ theo từng cột 
        return response()->json([
            'data' => $products
        ],200);

        // return redirect()->back();
    }

    public function update(Request $request,$id){
        Product::updateData($id, $request->only(['name','price']));

        return redirect()->back();

    }

    public function show($id){
        return Product::find($id);
    }
}