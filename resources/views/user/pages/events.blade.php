@extends('user.index')
@section('content')

        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Upcoming Events</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Home</a>
                        <a href="">Events</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        
        <!-- Event Start -->
        <div class="event">
            <div class="container">
                <div class="section-header text-center">
                    <p>Upcoming Events</p>
                    <h2>Be ready for our upcoming charity events</h2>
                </div>
                <div class="row">

                    @foreach ($upcoming_event as $item)
                        
                   
                    <div class="col-lg-6">
                        <div class="event-item">
                            <img src="{{asset('event_image')}}/{{$item->image}}" style="max-height: 200px;" alt="Image">
                            <div class="event-content">
                                <div class="event-meta">
                                    <p><i class="fa fa-calendar-alt"></i>{{$item->date}}</p>
                                    <p><i class="far fa-clock"></i>{{$item->starting_time}} - {{$item->ending_time}}</p>
                                    <p><i class="fa fa-map-marker-alt"></i>{{$item->location}}</p>
                                </div>
                                <div class="event-text">
                                    <h3>{{$item->title}}</h3>
                                    <p>
                                    {{$item->title}}   
                                    </p>
                                    <a class="btn btn-custom" href="">Join Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                   

                </div>
            </div>
        </div>
        <div class="event">
            <div class="container">
                <div class="section-header text-center">
                    <p>Completed Events</p>
                    <h2>We have completed our target </h2>
                </div>
                <div class="row">

                    @foreach ($completed_event as $item)
                    
                       
                    <div class="col-lg-6">
                        <div class="event-item">
                            <img src="{{asset('event_image')}}/{{$item->image}}" style="max-height: 200px;" alt="Image">
                            <div class="event-content">
                                <div class="event-meta">
                                    <p><i class="fa fa-calendar-alt"></i>{{$item->date}}</p>
                                    <p><i class="far fa-clock"></i>{{$item->starting_time}} - {{$item->ending_time}}</p>
                                    <p><i class="fa fa-map-marker-alt"></i>{{$item->location}}</p>
                                </div>
                                <div class="event-text">
                                    <h3>{{$item->title}}</h3>
                                    <p>
                                    {{$item->title}}   
                                    </p>
                                    <a class="btn btn-custom" href="{{route('single.view',$item->id)}}}">View Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                   

                </div>
            </div>
        </div>
        <!-- Event End -->




@endsection  