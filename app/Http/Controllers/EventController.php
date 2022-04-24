<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    public function index(Request $req){
        $search = request('search');
        if($search){
            $events = Event::where([
                ['title', 'like', '%'.$search.'%'],
                ['private', '!=', '1']
            ])->get();
        }else{
            $events = Event::where([['private', '!=', '1']]);
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
        $event->date = $req->target_date;
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
        $user = auth()->user();
        $event->user_id = $user->id;
        $event->save();
        return redirect('/')->with('msg', 'evento adicionado');
    }

    public function show($id){
        $event = Event::findOrFail($id);

        $owner = User::where('id', '=', $event->user_id)->first()->toArray();
        #falta criar a view
        return view('events.show', ['event'=>$event, 'owner'=>$owner]);
    }

    public function destroy($id){
        $result = Event::findOrFail($id)->delete();
        return redirect('/dashboard')->with('msg', $result ? "Evento removido com sucesso" : "Falha ao remover evento");
    }

    public function dashboard(){
        $search = request('search');
        $user = auth()->user();
        $userEvents = $user->events;
        return view('events.dashboard', ['events'=>$userEvents, 'search' => $search]);
    }
}
