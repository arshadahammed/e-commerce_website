<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class MainfrontendController extends Controller
{

    public function index()
    {  
        $featured_products = Product::where('trending','1')->take(15)->get();
        $trending_categories = Category::where('popular','1')->take(15)->get();
       return view('frontend.index',compact('featured_products', 'trending_categories'));
 
     }

    public function category()
    {
      
     $category = Category::where('status', '0')->get();
     return view('frontend.category',compact('category'));
    }
    

  public function viewCategory($slug)
  {
   if(Category::where('slug', $slug)->exists())
      {

       $category = Category::where('slug', $slug)->first();
       $products = Product::Where('cate_id', $category->id)->where('status', '0')->get();
       return view('frontend.products.index', compact('category','products'));
      } 

     else{

        return redirect('/')-> with('status', "Slug doesnt exists");

   }
            
   
  }  





  
  
  public function productView($cate_slug, $prod_slug)
  {
    if(Category::where('slug',$cate_slug)->exists())
    {
      if(Product::where('slug',$prod_slug)->exists()){
        $products = Product::where('slug', $prod_slug)->first();
        return view('frontend.products.view',compact('products'));

      }


      else{

      return redirect('/')-> with('status', "This link was Brocken");
      }

     

    }
    else{

      return redirect('/')-> with('status', "No Such Category Found");
      }

  }






}
