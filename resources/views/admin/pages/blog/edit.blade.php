@extends('admin.index')
@section('content')

<section style="padding-top:60px;">
    <div class="container" style="width: 95rem;">
        <div class="col-md-8 offset-md-2">
            <div class="card">
               <div class="card-header">Add Blog
               <a href="" style="float:right;" class="btn btn-primary "> List</a>
               
               </div>
               <div class="card-body">

                        <form method="POST" action="{{route('blog.update')}}" enctype="multipart/form-data" >
                           
                            @csrf
                            @method('PUT') 
                

                              <input type="hidden" name="id" value="{{$blog->id}}">

                            <div class="form-group">
                              <label for ="description"> Title </label>
                              <input type="text" name="title" class="form-control" class="@error('title') is-valid @enderror" value="{{$blog->title}}"/>                 
                              @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>
                  
                            <div class="form-group">
                              <label for ="description"> Description </label>
                              <textarea type="text" rows="5" name="discription" class="form-control" class="@error('description') is-valid @enderror" value="{{$blog->description}}"/> 
                                {{$blog->discription}}                
                              </textarea>
                              @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>
                            
                            <div class="form-group">
                              <label for ="description">Blog Paragraph</label>
                              <input type="text"    name="blog_paragraph" class="form-control" class="@error('link') is-valid @enderror" value="{{$blog->blog_paragraph}}"/>  
                                      
                            
                              @error('blog_paragraph')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>

                            <div class="form-group">
                            <label for ="target">Image</label>
                            <input type="file" name="image" class="form-control" value="{{$blog->image}}" class="@error('image') is-valid @enderror" />                            
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror  
                               <img src="{{asset('blog_image')}}/{{$blog->image}}" style="max-height: 100px;"/>
                            </div>



                            <button type="submit" class="btn btn-success" >Update Blog</button>

                        </form>               
                    </div>
                   
             </div>
        </div>
    </div>
</section>


    
@endsection