<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    
    public function getSubCategoryByCategory()
    {
        $category = Category::find( request()->category_id);
        
        $subCategories =  $category->subCategories;

        return  $subCategories;
    }

    
    public function getproductBySubCategory()
    {
        $sub_category = SubCategory::find( request()->sub_category_id);
        
        $products =  $sub_category->products;

        return  $products;
    }



}
