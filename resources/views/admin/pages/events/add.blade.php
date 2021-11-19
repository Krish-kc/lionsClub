@extends('admin.index')
@section('content')

<section style="padding-top:60px;">
    <div class="container" style="width: 95rem;">
        <div class="col-md-8 offset-md-2">
            <div class="card">
               <div class="card-header">Add Events
               <a href="" style="float:right;" class="btn btn-primary "> List</a>
               
               </div>
               <div class="card-body">

                        <form method="POST" action="{{route('event.store')}}" enctype="multipart/form-data" >
                           
                            @csrf
                

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
                              <input type="text"    name="link" class="form-control" class="@error('link') is-valid @enderror" placeholder="Enter  link"/>                 
                              
                              @error('link')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>
                            <div class="form-group">
                              <label for ="description">location</label>
                              <input  type="text"    name="location" class="form-control" class="@error('link') is-valid @enderror" placeholder="Enter  location"/>                 
                              
                              @error('location')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>
                            <div class="form-group">
                              <label for ="description">Starting Time</label>
                              <input  type="time"    name="starting_time" class="form-control" class="@error('link') is-valid @enderror" placeholder="Enter  time"/>                 
                              
                            <div class="form-group">
                              <label for ="description">Ending Time</label>
                              <input  type="time"    name="ending_time" class="form-control" class="@error('link') is-valid @enderror" placeholder="Enter  time"/>                 
                              
                              @error('ending_time')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>
                            <div class="form-group">
                              <label for ="description">Date</label>
                              <input  type="date"    name="date" class="form-control" class="@error('link') is-valid @enderror" placeholder="Enter  date"/>                 
                              
                              @error('date')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>
                            <div class="form-group">
                              <label for ='exampleFormControlSelect1'>Upcoming Events</label>
                              <select class="form-control" name='upcoming_events' id="exampleFormControlSelect1">
                                <option> Yes</option>  
                                <option> No</option>  
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

                            <button type="submit" class="btn btn-success" >Add Events</button>

                        </form>               
                    </div>
                   
             </div>
        </div>
    </div>
</section>


    
@endsection