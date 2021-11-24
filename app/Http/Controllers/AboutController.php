<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use File;

class AboutController extends Controller
{
    //
    public function add(){
        return view('admin.pages.about.add');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'mission' => 'required',
            'vision' => 'required',
            'image' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);

        if($request->hasFile('image'))
        {
         $image=$request->file('image');
         $imageName = time().'.'.$image->getClientOriginalExtension(); 
         $image->move(public_path('about_image'), $imageName);
        }else{
             $imageName=null;
 
        }

        $about=new About();
        $about->title=$request->title;
        $about->description=$request->description;
        $about->mission=$request->mission;
        $about->image=$imageName;
        $about->vision=$request->vision;
        $about->save();
        toastr()->success('About has Successfully Created');
        return redirect('/admin/about/list');

    }


    public function list(){
        $about = About::all();
        return view('admin.pages.about.list',compact('about'));
    }

    public function edit($id){
        $about=About::findOrFail($id);
        return view('admin.pages.about.edit',compact('about'));
    }
    
    public function update(Request $request){
        $about=About::findOrFail($request->id);
        if($request->hasFile('image'))
        {
            $destination ='about_image'.$about->image;
            if(File::exists($destination))
            {
                File:: delete($destination);
            }
            $image=$request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imageName = time(). '.' .$extension;
            $image->move('about_image',$imageName);
            $about->image=$imageName;

        }else{
            $imageName=$about->image;
        }


        $about->update([
            
            'title'=>$request->title,
            'description'=>$request->description,
            'mission'=>$request->mission,
            'image'=>$image,
            'vision'=>$request->vision
        ]);
     return redirect('/admin/about/list');
       toastr()->success('About has Successfully updated');
    }

    public function destroy($id){
        
        $delete = About::findorfail($id);
        unlink('about_image/'.$delete->image);

        About::where('image', $delete->image)->delete();
        toastr()->warning('About has been deleted sucessfully');
        return redirect('/admin/about/list');
        


    }
}
