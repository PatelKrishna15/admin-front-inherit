<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
// use Cviebrock\EloquentSluggable\Sluggable;
// use Cviebrock\EloquentSluggable\Service;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::paginate(8);
        return view('admin.category.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required',

            'name' => 'required',

        ]);
        $category =new Category();
        $category->slug =$request->slug;
        // $slug = SlugService::createSlug(Page::class, 'slug', $request->name);
        $category->name =$request->name;    
        $category->save();
        // return response()->json(['slug' => $slug]);
        return redirect()->route('admin.category.index');
        
    }
    public function checkslug(Request $request)
    {
        $slug =SlugService::createSlug(Category::class,'slug',$request->name);
        return response()->json(['slug'=>$slug]);
    }
 
}
