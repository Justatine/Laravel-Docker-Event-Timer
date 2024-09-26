<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{   
    public function addEvent(){
        $user = Auth::user();

        $data = request()->validate([
            'name'=>['required', 'string'],
            'deadline'=>['required', 'date']
        ]);

        $data['userId'] = $user->id;
        $data['created_at'] = now();
        
        $query = Events::insert($data);  
        if (!$query) {
            return redirect()->back()->withErrors(['add'=>'Unable to add event']);
        }

        return redirect()->back()->with(['status'=> 'success', 'message' =>'Event added']);
    }

    public function deleteEvent() {
        $data = request()->validate([
            'eventId' => ['required', 'numeric']
        ]);
    
        $event = Events::find($data['eventId']);
        
        if ($event) {
            if ($event->delete()) {
                return redirect()->back()->with(['status' => 'success', 'message' => 'Event deleted successfully']);
            }
            return redirect()->back()->with(['status' => 'failed', 'message' => 'Failed to delete event']);
        }
        // return response()->json(['status' => 'success', 'message' => 'Event deleted successfully']);
        return redirect()->back()->with(['status' => 'failed', 'message' => 'Event not found']);
    }    

    public function edit(Request $request)
    {
        $eventId = $request->query('eventId');

        $event = Events::find($eventId);

        if (!$event) {
            return redirect()->back()->with('status', 'failed')->with('message', 'Event not found');
        }

        return view('pages.dashboard.event.edit', 
        compact('event'));
    }

    public function update($eventId){
        $user = Auth::user();
        $event = Events::find($eventId);

        if ($user->id != $event->userId) {
            return redirect()->back()->with(['status'=>'failed', 'message'=>'Event not found.']);
        }

        $data = request()->validate([
            'name'=>['required', 'string'],
            'deadline'=>['required', 'date'],
            'status'=>['required', 'string']
        ]);

        $data['eventId'] = $eventId;
        $data['updated_at'] = now();
        
        $event = Events::where('eventId', $eventId)->update($data);
        if (!$event) {
            return redirect()->back()->withErrors(['error'=>'Failed updating event.']);
        }

        return redirect()->back()->with(key: ['status'=>'success', 'message'=>'Event updated']);
    }
}
