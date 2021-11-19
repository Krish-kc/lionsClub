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

                        <form method="POST" action="{{url("banner_store")}}" enctype="multipart/form-data" >
                           
                            @csrf
                            @method('POST')
                

                            <div class="form-group">
                              <label for ="description"> Title </label>
                              <input type="text" name="title" class="form-control" class="@error('title') is-valid @enderror" placeholder="Enter  title"/>                 
                              @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>
                  
                            <div class="form-group">
                              <label for ="description"> Description </label>
                              <textarea type="text" rows="5" name="description" class="form-control" class="@error('description') is-valid @enderror" placeholder="Enter  description"/>                 
                              </textarea>
                              @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>
                            
                            <div class="form-group">
                              <label for ="description">Link</label>
                              <textarea type="text"    name="link" class="form-control" class="@error('link') is-valid @enderror" placeholder="Enter  description"/>                 
                              </textarea>
                              @error('link')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>


                            <div class="form-group">
                            <label for ="target">Image</label>
                            <input type="file" name="image" class="form-control" class="@error('image') is-valid @enderror" />                            
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror   
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select class="form-control" name="status" id="exampleFormControlSelect1">
                                  <option>on</option>
                                  <option>off</option>
                                </select>
                                
                              </div>
                              

                            <button type="submit" class="btn btn-success" >Add Banner</button>

                        </form>               
                    </div>
                   
             </div>
        </div>
    </div>
</section>


    
@endsection