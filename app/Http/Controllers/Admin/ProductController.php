<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
      $products = Product::all();
      return view('admin.product.index', compact('products'));
    }
    
    public function add()

    {
         $category = Category::all();
        return view('admin.product.add', compact('category'));
    }


    public function addProduct(Request $request)
    {
        $products = new Product();
         if($request->hasFile('image')){
  

         $file = $request->file('image');
          $ext = $file->getClientOriginalExtension();
          $filename = time().'.'.$ext;
          $file->move('assets/uploads/products/',$filename);
           $products->image=$filename;

        }
        $products->cate_id = $request->input('cate_id');
         $products->name = $request->input('name');
          $products->slug = $request->input('slug');
           $products->small_description = $request->input('small_description');
            $products->description = $request->input('description');
             $products->original_price = $request->input('original_price');
              $products->selling_price = $request->input('selling_price');
               $products->qty = $request->input('qty');
                $products->tax = $request->input('tax');
                 $products->status = $request->input('status') == TRUE ? '1':'0';
         $products->trending = $request->input('trending') == TRUE ? '1':'0';
         $products->meta_title = $request->input('meta_title');
        $products->meta_descrip = $request->input('meta_descrip');
            $products->meta_keywords = $request->input('meta_keywords');
            $products->save();
              return redirect('/products')->with('status',"Products Added Successfully ");


        
    }

    public function editProduct($id)
    { 
       $products = Product::find($id);
       return view('admin.product.edit', compact('products'));
    }

    public function updateProduct(Request $request , $id)
    {
      $products = Product::find($id);
        if($request->hasFile('image')){

         $path = 'assets/uploads/products'.$products->image;
         if(file::exists($path))
         {
            file::delete($path);
         }
  

         $file = $request->file('image');
          $ext = $file->getClientOriginalExtension();
          $filename = time().'.'.$ext;
          $file->move('assets/uploads/products/',$filename);
           $products->image=$filename;

        }


       
         $products->name = $request->input('name');
          $products->slug = $request->input('slug');
           $products->small_description = $request->input('small_description');
            $products->description = $request->input('description');
             $products->original_price = $request->input('original_price');
              $products->selling_price = $request->input('selling_price');
               $products->qty = $request->input('qty');
                $products->tax = $request->input('tax');
         $products->status = $request->input('status') == TRUE ? '1':'0';
         $products->trending = $request->input('trending') == TRUE ? '1':'0';
         $products->meta_title = $request->input('meta_title');
        $products->meta_descrip = $request->input('meta_descrip');
            $products->meta_keywords = $request->input('meta_keywords');
            $products->update();
              return redirect('/products')->with('status',"Products Updated Successfully ");
       
     


    }

    public function deleteProduct($id)
    {
      $products = Product::find($id);
       if($products->image){
            $path = 'assets/uploads/products/'.$products->image;
            if(file::exists($path)){

               file::delete($path);
            }

         }
           $products->delete();
           return redirect('/products')->with('status',"Products Deleted Successfully ");
     
    }
    
}
