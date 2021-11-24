<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use File;

class BannnerController extends Controller
{
   

    public function add(){
        return view('admin.pages.banner.add');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'link' => 'required',
            'image' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);

        if($request->hasFile('image'))
        {
         $image=$request->file('image');
         $imageName = time().'.'.$image->getClientOriginalExtension(); 
         $image->move(public_path('banner_image'), $imageName);
        }else{
             $imageName=null;
 
        }


        $banner=new Banner();
        $banner->title=$request->title;
        $banner->description=$request->description;
        $banner->link=$request->link;
        $banner->image=$imageName;
        $banner->status=$request->status;
        $banner->save();
        toastr()->success('Banner has Successfully Created');
        return redirect('/admin/banner/list');
        
         
    }

    public function index(){
        $banner=Banner::all();
        return view('admin.pages.banner.list',compact('banner'));

    }
    
    public function edit($id){
        $banner=Banner::findOrFail($id);
        return view('admin.pages.banner.edit',compact('banner'));
    }


    public function update(Request $request){
        $banner=Banner::findOrFail($request->id);
        if($request->hasFile('image'))
        {
            $destination ='banner_image'.$banner->image;
            if(File::exists($destination))
            {
                File:: delete($destination);
            }
            $image=$request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imageName = time(). '.' .$extension;
            $image->move('banner_image',$imageName);
            $banner->image=$imageName;

        }else{
            $imageName=$banner->image;
        }


        // $banner=Banner::findOrFail($request->id);

        $banner->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'link'=>$request->link,
            'image'=>$imageName,
            'status'=>$request->status
        ]);
     return redirect('/admin/banner/list');
       toastr()->success('Banner has Successfully updated');
    }






    public function changeStatus(Request $request)
    {
        dd(fuck);
        $order = Banner::find($request->id);
        $order->status = $request->status;
        $order->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }


    public function destroy($id)
    {
        
        $banner=Banner::find($id);
        unlink("banner_image/".$banner->image);

        Banner::where("image", $banner->image)->delete();
        toastr()->warning('Banner has been delete successfully!');
         return redirect('/admin/banner/list');
 

    }



}
