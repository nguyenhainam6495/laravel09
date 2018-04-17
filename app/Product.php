<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $table = 'products'; //optional ( có ko đều đk )

    protected $fillable = ['name', 'price']; // mảng thay kí tự bằng chữ array

    /**
     * Lấy tất cả bản ghi trong product table
     * @return [type] [description]
     */
    public static function getAll(){
    	return Product::orderBy('id','desc')->get();
    }

    /**
     * Xóa bản ghi theo id
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function del($id){
    	return Product::find($id)->delete();
    }

    /**
     * luu du lieu vao database
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public static function storeData($data){
        // ['name' => 'name', 'price'=> '123'];
         $product = Product::create($data); // dung cach goi ngan
        
        // $product = new Product;
        // $product->name = $data['name'];
        // $product->price = $data['price'];
        // $product->save();

        return $product;
    }

    public static function updateData($id, $data){
        $product = Product::find($id);

        $product->name = $data['name'];
        $product->price = $data['price'];
        $product->save();

        return $product;
    }
}
