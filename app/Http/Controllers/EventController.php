<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function add(){
        return view('admin.pages.events.add');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'link' => 'required',
            'image' => 'required',
            'date' => 'required',
            'location' => 'required',
            'starting_time' => 'required',
            'ending_time' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);

        if($request->hasFile('image'))
        {
         $image=$request->file('image');
         $imageName = time().'.'.$image->getClientOriginalExtension(); 
         $image->move(public_path('event_image'), $imageName);
        }else{
             $imageName=null;
 
        }

        $event=new Event();
        $event->title=$request->title;
        $event->description=$request->description;
        $event->link=$request->link;
        $event->date=$request->date;
        $event->location=$request->location;
        $event->starting_time=$request->starting_time;
        $event->ending_time=$request->ending_time;
        $event->upcoming_events=$request->upcoming_events;
        $event->image=$imageName;
        $event->status=$request->status;
        $event->save();
        toastr()->success('Event has Successfully created');
        return redirect('/admin/events/list');
    }

    public function event(){
        $event=Event::all();
        return view('admin.pages.events.list',compact('event'));

    }

    
    

    public function edit($id){
        $event=Event::findOrFail($id);
        return view('admin.pages.events.edit',compact('event'));
    }

    public function update(Request $request){
        if($request->hasFile('image'))
        {
         $image=$request->file('image');
         $imageName = time().'.'.$image->getClientOriginalExtension(); 
         $image->move(public_path('event_image'), $imageName);
        }else{
             $imageName=null;
 
        }
        $event=Event::findOrFail($request->id);

        $event->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'link'=>$request->link,
            'image'=>$imageName,
            'status'=>$request->status,
            'location'=>$request->location,
            'starting_time'=>$request->starting_time,
            'ending_time'=>$request->ending_time,
            'upcoming_events'=>$request->upcoming_events,
        ]);
        toastr()->success('Event has Successfully updated');
        return redirect('/admin/events/list');
    }

    public function delete($id){
        Event::find($id)->delete();
        toastr()->warning('Event has been delete successfully!');
       return redirect('/admin/events/list');
    }
}
