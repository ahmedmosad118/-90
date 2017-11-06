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
    public function productAdd()
    {
        $properties=Property::all();
        $categories=Category::all();
        return view("product.product-add", compact("properties", "categories"));
    }
    public function postProduct(Request $request)
    {
      // $a=(array) $request->value;
      // $b=(array) $request->property_id;
      // $aa=array_combine($a, $b);
      // foreach ($aa as $key => $value) {
      //   dd($key);
      // }
        // dd($aa);
        $this->validate($request, [
          'price' => 'required|regex:"^[0-9]"',
          'name' => 'required',
          'value' => 'required',
          'category_id' => 'required',
          ]);

        $product= new Product;
        $product->name=$request->name;
        $product->price=$request->price;
        $product->description=$request->description;
        $product->category_id=$request->category_id;
        $product->save();
        $a=(array) $request->value;
        $b=(array) $request->property_id;
        $property = [];
        $aa=array_combine($a, $b);
        foreach ($aa as $key => $value) {
          $dataSet[] = [
           'value'  => $key,
           'property_id'    => $value,
           'product_id'       => $product->id,
       ];
       DB::table('product_property_records')->insert($property);

        }


        return back();
    }
    public function productList()
    {
        $product=Product::all();
        return view("home", compact("product"));
    }
    public function getProperty()
    {
        $category=Input::get("category_id");
        $property=Property::where("category_id", "=", $category)->get();
        return Response::json($property);
    }
    public function deleteProduct($id)
    {
        $product=Product::find($id);
        $product->delete();
        return back();
    }
    public  function editProduct($id)
    {
      $product=Product::find($id);
      $properties=Property::all();
      $categories=Category::all();
      return view("product.product-add", compact("properties", "categories","product"));
    }
    public  function putProduct($id)
    {
      dd($request->all);
      $product=Product::find($id);
      $product->name=$request->name;
      $product->price=$request->price;
      $product->description=$request->description;
      $product->category_id=$request->category_id;
      $product->save();
      $a=(array) $request->value;
      $b=(array) $request->property_id;
      $property = [];
      $aa=array_combine($a, $b);
      foreach ($aa as $key => $value) {
        $dataSet[] = [
         'value'  => $key,
         'property_id'    => $value,
         'product_id'       => $product->id,
     ];
     DB::table('product_property_records')->insert($property);

      }


      return back();

    }

}
