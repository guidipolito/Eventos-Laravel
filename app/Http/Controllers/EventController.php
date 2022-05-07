<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\User;
use Image;

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
            $events = Event::where([['private', '=', '0']])->get();
        }
        return view('events.list', [
            'events'=>$events,
            'search'=>$search,
        ]);
    }

    public function createPage(){
        return view('events.form');
    }

    private function moveImage($file, $thumbnail=true){
        $response = [];
        $imgName = md5($file->getClientOriginalName() . strtotime("now"));
        $imgName = "/img/events/".$imgName;
        $newImg = Image::make($file->path());
        $newImg->save(public_path('img/events').'.jpg', 80);
        $response['normal']=$imgName.'.jpg';
        if($thumbnail){
            $newImg->fit(80);
            $newImg->save(public_path($imgName).'_thumbnail.jpg', 80);
            $response['thumbnail'] = $imgName.'_thumbnail.jpg';
        }
        return $response;
    }

    public function store(Request $req){
        $event = new Event;
        $event->title = $req->title;
        $event->date = $req->target_date;
        $event->city = $req->city;
        $event->description = $req->desc;
        $event->private = $req->private ? true : false;
        if($req->hasFile('event_img') && $req->file('event_img')->isValid()){
            $img = $this->moveImage($req->event_img);
            dd($img);
            $event->image = $img['normal'];
            $event->thumbnail = $img['thumbnail'];
        }
        $user = auth()->user();
        $event->user_id = $user->id;
        $event->save();
        return redirect('/dashboard')->with('msg', 'evento adicionado');
    }

    public function show($id){
        $event = Event::findOrFail($id);
        $user = auth()->user();
        if($event){
            $owner = User::where('id', '=', $event->user_id)->first();
            if($event->private){
                if($event->user_id != $user?->id){
                    return;
                }
            }
            return view('events.show', ['event'=>$event, 'owner'=>$owner]);
        }
    }
    public function edit(Request $req){
        dd($req);
        $updateId = $req->id;
        if(!is_numeric){
            return View('errors.404');
        }
        $event = Event::findOrFail($updateId);
        $event->title = $req->title;
        $event->date = $req->target_date;
        $event->city = $req->city;
        $event->description = $req->desc;
        $event->private = $req->private ? true : false;
        $oldImage = $event->image;
        if($req->hasFile('event_img') && $req->file('event_img')->isValid()){
            $img = $req->event_img;
            $ext = $img->extension();
            $imgName = md5($img->getClientOriginalName() . strtotime("now")).".".$ext;
            $img->move(public_path('img/events'), $imgName);
            $imgName = "/img/events/".$imgName;
            $event->image = "img/events/".$imgName.".jpg";
            $event->thumbnail = $imgName."_thumbnail.jpg";
        }else{
            $req->image = "";
        }
        $user = auth()->user();
        $event->user_id = $user->id;
        if($event->save() && $oldImage != $event->image){
            File::delete($oldImage);
        }
    }
    public function editPage($id){
        $event = Event::findOrFail($id);
        $user = auth()->user();
        if($event->user_id == $user->id){
            return view('events.form', ['event'=>$event]);
        }
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
