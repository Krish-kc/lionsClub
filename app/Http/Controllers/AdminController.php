<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use DB;

class AdminController extends Controller
{
 
    public function AdminHome(){
        $event_count=Event::all()->count();
        $register_count =DB::table('users')->count();

        return view('admin.pages.dashbord', compact('event_count','register_count'));

    }

  

}
