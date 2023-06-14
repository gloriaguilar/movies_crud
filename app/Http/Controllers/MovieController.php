<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use App\Models\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MovieController extends Controller
{
    //

    public function index(){
        
  
        $movies = Movie::with(['category','platform'])->get();
        return view('movie.movie-list',compact('movies'));
    }

    public function add(){
        $categories = Category::get();
        $platforms = Platform::get();
        return view('movie.movie-add', compact(['categories','platforms']));
    }

    
    public function save(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'year' => 'required',
            'category' => 'required',
            'platform' => 'required',
            "url_image" => 'required'
        ]);

        $movie = new Movie();

        $movie->title= $request->title;
        $movie->description = $request->description;
        $movie->year = $request->year;
        $movie->url_image = $request->url_image;
        $movie->category_id = $request->category;
        $movie->platform_id = $request->platform;
        $movie->user_id = $this->getUserID();
        $movie->save();
        return redirect()->back()->with('success', 'Movie Added');

    }

    public function edit($id){
        $categories = Category::get();
        $platforms = Platform::get();
        $movieToEdit= Movie::where('id','=', $id)->first();
        
        return view('movie.movie-edit', compact(['categories','platforms','movieToEdit']));
    }

    public function update(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'year' => 'required',
            'category' => 'required',
            'platform' => 'required',
            "url_image" => 'required'
        ]);


        Movie::where('id','=', $request->id)->update([
            'title' => $request->title,
            'description' =>  $request->description,
            'year' => $request->year,
            'category_id' => $request->category,
            'platform_id' => $request->platform,
            "url_image" =>  $request->url_image,
            "user_id" => $this->getUserID()
        ]);
        return redirect()->back()->with('success', 'Movie edited');

    }
    
    public function delete($id){
        try {
            Movie::where('id','=', $id)->delete();
             return redirect()->back()->with('success', 'Movie removed');
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