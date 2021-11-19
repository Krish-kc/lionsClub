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

                        <form method="POST" action="{{route('event.update')}}" enctype="multipart/form-data" >
                           
                            @csrf
                            @method('PUT') 
                

                              <input type="hidden" name="id" value="{{$event->id}}">

                            <div class="form-group">
                              <label for ="description"> Title </label>
                              <input type="text" name="title" class="form-control" class="@error('title') is-valid @enderror" value="{{$event->title}}"/>                 
                              @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>
                            
                            <div class="form-group">
                              <label for ="description"> Description </label>
                              <textarea type="text" rows="5" name="description" class="form-control" class="@error('description') is-valid @enderror" value="{{$event->description}}"/> 
                                {{$event->description}}                
                              </textarea>
                              @error('description')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror                            
                            </div>
                            
                            <div class="form-group">
                              <label for ="description">location</label>
                              <input type="text" name="location" class="form-control" class="@error('title') is-valid @enderror" value="{{$event->location}}"/>                 
                              @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>
                            <div class="form-group">
                              <label for ="description">Starting time </label>
                              <input type="text" name="starting_time" class="form-control" class="@error('title') is-valid @enderror" value="{{$event->starting_time}}"/>                 
                              @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>
                            <div class="form-group">
                              <label for ="description">Ending Time </label>
                              <input type="text" name="ending_time" class="form-control" class="@error('title') is-valid @enderror" value="{{$event->ending_time}}"/>                 
                              @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>
                            <div class="form-group">
                              <label for ="description">Date</label>
                              <input type="text" name="date" class="form-control" class="@error('title') is-valid @enderror" value="{{$event->date}}"/>                 
                              @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlSelect1">Upcoming Events</label>
                              <select class="form-control" name="upcoming_events" id="exampleFormControlSelect1">
                                <option {{($event->upcoming_events == 'yes'  ? 'selected':'')}} value ='yes'>Yes</option>
                                <option {{($event->upcoming_events =='no'  ? 'selected':'')}} value ='no'>No</option>
                              </select>
                            </div>


                            <div class="form-group">
                              <label for ="description">Link</label>
                              <input type="text"    name="link" class="form-control" class="@error('link') is-valid @enderror" value="{{$event->link}}"/>  
                                      
                            
                              @error('short_description')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror                            
                            </div>


                            <div class="form-group">
                            <label for ="target">Image</label>
                            <input type="file" name="image" class="form-control" value="{{$event->image}}" class="@error('image') is-valid @enderror" />                            
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror  
                               <img src="{{asset('event_image')}}/{{$event->image}}" style="max-height: 100px;"/>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select class="form-control" name="status" id="exampleFormControlSelect1" value="{{$event->status}}" >
                                
                                  <option {{($event->status=='on' ? 'Selected' :'')}} value="on">ON</option>
                                  <option {{($event->status=='off' ? 'Selected' :'')}} value="off">OFF</option>
                          

                        
                                  
                                </select>
                              </div>

                            <button type="submit" class="btn btn-success" >Update Events</button>

                        </form>               
                    </div>
                   
             </div>
        </div>
    </div>
</section>


    
@endsection