<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index($id){
        $search = request('search');
        return view('events.event', ['id'=>$id, 'search'=>$search]);
    }
    public function createPage(){
        return view('events.create');
    }
}
