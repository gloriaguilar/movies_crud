<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Platform;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class PlatformController extends Controller
{
    public function index(){
        
        //$data= User::find(1)->platform;
        $data = Platform::get();

        return view('platform.platform-list', compact('data'));
    }

    public function add(){
        return view('platform.platform-add');
    }
    
    public function save(Request $request){

        $request->validate([
            'title' => 'required',
            'url' => 'required',
            'image_url' => 'required',
        ]);

        $platform = new Platform();
        $platform->title = $request->title;
        $platform->url = $request->url;
        $platform->image_url = $request->image_url;
        $platform->user_id = $this->getUserID();
        $response = $platform->save();
        if(!$response){
            return redirect()->back()->with('faild', 'Something went wrong');
        }
        return redirect()->back()->with('success', 'Platform Added');
    }

    public function edit($id) {
        $data= Platform::where('id','=', $id)->first();
        return view('platform.platform-edit', compact('data'));
    }

    public function update(Request $request) {
        
        $request->validate([
            'title' => 'required',
            'url' => 'required',
            'image_url' => 'required',
        ]);

        Platform::where('id','=', $request->id)->update([
            'title' => $request->title,
            'url' => $request->url,
            'image_url' => $request->image_url,
            'user_id' => $this->getUserID()
        ]);
        
        return redirect()->back()->with('success', 'Platform Edited');
    }
    public function delete($id){
        try {
            Platform::where('id','=', $id)->delete();
            return redirect()->back()->with('success', 'Platform removed');
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