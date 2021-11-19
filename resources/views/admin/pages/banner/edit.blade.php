@extends('admin.index')
@section('content')

<section style="padding-top:60px;">
    <div class="container" style="width: 95rem;">
        <div class="col-md-8 offset-md-2">
            <div class="card">
               <div class="card-header">Add Banner
               <a href="" style="float:right;" class="btn btn-primary "> List</a>
               
               </div>
               <div class="card-body">

                        <form method="POST" action="{{route('banner.update')}}" enctype="multipart/form-data" >
                           
                            @csrf
                            @method('PUT') 
                

                              <input type="hidden" name="id" value="{{$banner->id}}">

                            <div class="form-group">
                              <label for ="description"> Title </label>
                              <input type="text" name="title" class="form-control" class="@error('title') is-valid @enderror" value="{{$banner->title}}"/>                 
                              @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>
                  
                            <div class="form-group">
                              <label for ="description"> Description </label>
                              <textarea type="text" rows="5" name="description" class="form-control" class="@error('description') is-valid @enderror" value="{{$banner->description}}"/> 
                                {{$banner->description}}                
                              </textarea>
                              @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>
                            
                            <div class="form-group">
                              <label for ="description">Link</label>
                              <input type="text"    name="link" class="form-control" class="@error('link') is-valid @enderror" value="{{$banner->link}}"/>  
                                      
                            
                              @error('short_description')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>


                            <div class="form-group">
                            <label for ="target">Image</label>
                            <input type="file" name="image" class="form-control" value="{{$banner->image}}" class="@error('image') is-valid @enderror" />                            
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror  
                               <img src="{{asset('banner_image')}}/{{$banner->image}}" style="max-height: 100px;"/>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select class="form-control" name="status" id="exampleFormControlSelect1" value="{{$banner->status}}" >
                                
                                  <option {{($banner->status=='on' ? 'Selected' :'')}} value="on">ON</option>
                                  <option {{($banner->status=='off' ? 'Selected' :'')}} value="off">OFF</option>
                          

                        
                                  
                                </select>
                              </div>

                            <button type="submit" class="btn btn-success" >Update Banner</button>

                        </form>               
                    </div>
                   
             </div>
        </div>
    </div>
</section>


    
@endsection