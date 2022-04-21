<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
    public function index(){
        $events = Event::all();
        return view('events.list', ['events'=>$events]);
    }
    public function createPage(){
        return view('events.create');
    }
    public function store(Request $req){
        $event = new Event;
        $event->title = $req->title;
        $event->city = $req->city;
        $event->description = $req->desc;
        $event->private = $req->private ? true : false;
        $event->save();
    }
}
