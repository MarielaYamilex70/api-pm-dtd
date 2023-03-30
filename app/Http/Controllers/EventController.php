<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events=Event::all();
        return response()->json($events);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|alpha_num',
            'date' => 'required|date',
            'url' => 'required|alpha_num',
            'max' => 'required|integer',
            'min' => 'required|integer',
         ]);

        $event=new Event;
        $event->name=$request->name;
        $event->date=$request->date;
        $event->url=$request->url;
        $event->max=$request->max;
        $event->min=$request->min;
        $event->save();
        $data =[
            'message'=> 'Event created successfully',
            'event'=>$event        
        ];
        return response()->json($data);
       

    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        // return response()->json($event);
        $data =[
            'message'=> 'Event details',
            'event'=>$event        
        ];
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required|alpha_num',
            'date' => 'required|date',
            'url' => 'required|alpha_num',
            'max' => 'required|integer',
            'min' => 'required|integer',
         ]);

        $event->name=$request->name;
        $event->date=$request->date;
        $event->url=$request->url;
        $event->max=$request->max;
        $event->min=$request->min;
        $event->save();
        $data =[
            'message'=> 'Event updated successfully',
            'event'=>$event        
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        $data =[
            'message'=> 'Event deleted successfully',
            'event'=>$event        
        ];
        return response()->json($data);
    }
}
