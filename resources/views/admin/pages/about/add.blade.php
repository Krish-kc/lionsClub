@extends('admin.index')
@section('content')

<section style="padding-top:60px;">
    <div class="container" style="width: 95rem;">
        <div class="col-md-8 offset-md-2">
            <div class="card">
               <div class="card-header">Add About
               <a href="" style="float:right;" class="btn btn-primary "> List</a>
               
               </div>
               <div class="card-body">

                        <form method="POST" action="{{route('about.store')}}" enctype="multipart/form-data" >
                           
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
                              <label for ="description">Mission</label>
                              <textarea type="text"    name="mission" class="form-control" class="@error('link') is-valid @enderror" placeholder="Enter  description"/>                 
                              </textarea>
                              @error('mission')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>
                            <div class="form-group">
                              <label for ="description">Vision</label>
                              <textarea type="text"    name="vision" class="form-control" class="@error('link') is-valid @enderror" placeholder="Enter  description"/>                 
                              </textarea>
                              @error('vision')
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

                              

                            <button type="submit" class="btn btn-success" >Add About</button>

                        </form>               
                    </div>
                   
             </div>
        </div>
    </div>
</section>


    
@endsection