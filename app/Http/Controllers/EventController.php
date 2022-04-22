<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
    public function index(Request $req){
        $search = request('search');
        if($search){
            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        }else{
            $events = Event::all();
        }
        return view('events.list', [
            'events'=>$events,
            'search'=>$search,
        ]);
    }

    public function createPage(){
        return view('events.create');
    }

    public function store(Request $req){
        $event = new Event;
        $event->title = $req->title;
        $event->date = $req->date;
        $event->city = $req->city;
        $event->description = $req->desc;
        $event->private = $req->private ? true : false;
        if($req->hasFile('event_img') && $req->file('event_img')->isValid()){
            $img = $req->event_img;
            $ext = $img->extension();
            $imgName = md5($img->getClientOriginalName() . strtotime("now")).".".$ext;
            $img->move(public_path('img/events'), $imgName);
            $event->image = $imgName;
        }
        $event->save();
        return redirect('/')->with('msg', 'evento adicionado');
    }
}
