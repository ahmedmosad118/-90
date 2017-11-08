<?php

namespace App\Http\Controllers;

use App\Property;
use App\Category;
use App\Product;
use DB;
use App\ProductPropertyRecord;
use Illuminate\Support\Facades\Input;
use Response;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Add Product
    public function productAdd()
    {
        $properties=Property::all();
        $categories=Category::all();
        return view("product.product-add", compact("properties", "categories"));
    }

    // post Product and save it in database
    public function postProduct(Request $request)
    {
        // Validate
        $this->validate($request, [
          'price' => 'required|regex:"^[0-9]"',
          'name' => 'required',
          'value' => 'required',
          'category_id' => 'required',
          ]);
        if ($request->has(["name","price","category_id"])) {
            $product= new Product;
            $product->name=$request->name;
            $product->price=$request->price;
            $product->description=$request->description;
            $product->category_id=$request->category_id;
            $product->save();
            $value=(array) $request->value;
            $property_id=(array) $request->property_id;
            $records=array_combine($value, $property_id);
            foreach ($records as $key => $value) {
                $properties=new ProductPropertyRecord;
                $properties->value=$key;
                $properties->property_id=$value;
                $properties->product_id=$product->id;
                $properties->save();
            } // end foreach
        } //end if
        return back();
    }

    // get Product list
    public function productList()
    {
        $product=Product::all();
        return view("home", compact("product"));
    }

    //get property that use in Ajax
    public function getProperty()
    {
        $category=Input::get("category_id");
        $property=Property::where("category_id", "=", $category)->get();
        return Response::json($property);
    }

    //delete a product from database
    public function deleteProduct($id)
    {
        $product=Product::find($id);
        $product->delete();
        return redirect("/");
    }

    //edit product
    public function editProduct($id)
    {
        $product=Product::find($id);
        $properties=Property::all();
        $categories=Category::all();
        return view("product.product-add", compact("properties", "categories", "product"));
    }


    public function putProduct($id)
    {
        dd($request->all);
        $product=Product::find($id);
        $product->name=$request->name;
        $product->price=$request->price;
        $product->description=$request->description;
        $product->category_id=$request->category_id;
        $product->save();
        $value=(array) $request->value;
        $property_id=(array) $request->property_id;
        $records=array_combine($value, $property_id);
        foreach ($records as $key => $value) {
            $property = [
         'value'  => $key,
         'property_id'    => $value,
         'product_id'       => $product->id,
     ];
            DB::table('product_property_records')->insert($property);
        }
        return back();
    }

    //get Product as json
    public function getProduct()
    {
        $product=Product::all();
        return Response::json($product);
    }
}
