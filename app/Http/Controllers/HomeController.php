<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Event;
use App\Models\About;
use App\Models\Blog;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events=Event::all();

        $banner=Banner::where('status','on')->get();
        return view('user.pages.home',compact('banner'));
    }

    public function about(){
        return view('user.pages.about');
    }

    public function events(){
        $completed_event=Event::where('upcoming_events','no')->where('status','on')->get();
        $upcoming_event=Event::where('upcoming_events','yes')->where('status','on')->get();
        return view('user.pages.events', compact('upcoming_event',  'completed_event'));
    }

    public function single_event($id){
        $event=Event::findOrFail($id);
        return view('user.pages.single_event',compact('event'));
    }



    public function blog(){
        return view('user.pages.blog');
    }

    public function contact(){
        return view('user.pages.contact');
    }


}
