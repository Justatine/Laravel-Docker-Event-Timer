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
}
