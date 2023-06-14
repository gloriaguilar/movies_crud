<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    
    public function index(){
    
        $categories = Category::get();
        return view('category.category-list',compact('categories'));
    }

    public function add(){
        return view('category.category-add');
    }

    
    public function save(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $category = new Category();

        $category->title= $request->title;
        $category->description = $request->description;
        $category->user_id =$this->getUserID();
        $category->save();
        return redirect()->back()->with('success', 'Category Added');

    }

    public function edit($id){
        
        $categoryToEdit= Category::where('id','=', $id)->first();
        
        return view('category.category-edit', compact('categoryToEdit'));
    }

    public function update(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);


        Category::where('id','=', $request->id)->update([
            'title' => $request->title,
            'description' =>  $request->description,
            "user_id" => $this->getUserID()
        ]);
        return redirect()->back()->with('success', 'Category edited');

    }

    public function delete($id){
        
        try {
           Category::where('id','=', $id)->delete();
            return redirect()->back()->with('success', 'Category removed');
        } catch (\Throwable $th) {
            return redirect()->back()->with('fail', 'You cannot remove this record. Please contact your administrator');
        }
           
       
    }

    private function getUserID(){

        if(Session()->has('loginID')){
        
            return $value = Session::get('loginID');
        }
     
    }
}