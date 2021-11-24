<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use File;

class BlogController extends Controller
{
    //
    public function create(){
        return view('admin.pages.blog.add');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|max:255',
            'discription' => 'required',
            'blog_paragraph' => 'required',
            'image' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);

        if($request->hasFile('image'))
        {
         $image=$request->file('image');
         $imageName = time().'.'.$image->getClientOriginalExtension(); 
         $image->move(public_path('blog_image'), $imageName);
        }else{
             $imageName=null;
 
        }

        $blog=new Blog();
        $blog->title=$request->title;
        $blog->discription=$request->discription;
        $blog->blog_paragraph=$request->blog_paragraph;
        $blog->image=$imageName;
        $blog->save();
        toastr()->success('Blog has Successfully Created');
        return redirect('/admin/blog/list');

    }


    public function list(){
        $blog = Blog::all();
        return view('admin.pages.blog.list',compact('blog'));
    }

    public function edit($id){
        $blog=Blog::findOrFail($id);
        return view('admin.pages.blog.edit',compact('blog'));
    }
    
    public function update(Request $request){
        $blog=Blog::findOrFail($request->id);
        if($request->hasFile('image'))
        {
            $destination ='blog_image'.$blog->image;
            if(File::exists($destination))
            {
                File:: delete($destination);
            }
            $image=$request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imageName = time(). '.' .$extension;
            $image->move('blog_image',$imageName);
            $blog->image=$imageName;

        }else{
            $imageName=$blog->image;
        }


        $blog->update([
            
            'title'=>$request->title,
            'discription'=>$request->discription,
            'blog_paragraph'=>$request->blog_paragraph,
            'image'=>$image,
        ]);
     return redirect('/admin/blog/list');
       toastr()->success('Blog has Successfully updated');
    }

    public function destroy($id){
        
        $delete = Blog::findorfail($id);
        unlink('blog_image/'.$delete->image);

        Blog::where('image', $delete->image)->delete();
        toastr()->warning('Blog has been deleted sucessfully');
        return redirect('/admin/blog/list');
        


    }
}
