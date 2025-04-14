<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;

class EventApiController extends Controller
{
    // Categorized Events: Today, Future, Past
    public function index()
    {
        $today = Carbon::today()->toDateString();

        return response()->json([
            'today'  => Event::whereDate('event_date', $today)->get(),
            'future' => Event::whereDate('event_date', '>', $today)->get(),
            'past'   => Event::whereDate('event_date', '<', $today)->get(),
        ]);
    }

    // Get all events (uncategorized)
    public function apiIndex()
    {
        return response()->json(Event::all());
    }

    // Create a general event (any date)
    public function apiStore(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'event_date'  => 'required|date',
            'time'        => 'nullable',
            'location'    => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $event = Event::create($validated);
        return response()->json($event, 201);
    }

    // Update a general event
    public function apiUpdate(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'event_date'  => 'required|date',
            'time'        => 'nullable',
            'location'    => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $event->update($validated);
        return response()->json($event);
    }

    // Delete a general event
    public function apiDestroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return response()->json(['message' => 'Event deleted successfully']);
    }
    
    ////////////////////////
	// TODAY EVENTS CRUD
	////////////////////////

	public function getToday()
	{
	    $today = Carbon::today()->toDateString();
	    $events = Event::whereDate('event_date', $today)->get();
	    return response()->json($events);
	}

	public function storeToday(Request $request)
	{
	    $today = Carbon::today()->toDateString();

	    $validated = $request->validate([
		'title'       => 'required|string|max:255',
		'event_date'  => "required|date|in:$today",
		'time'        => 'nullable',
		'location'    => 'nullable|string|max:255',
		'description' => 'nullable|string',
	    ]);

	    $event = Event::create($validated);
	    return response()->json($event, 201);
	}

	public function updateToday(Request $request, $id)
	{
	    $event = Event::findOrFail($id);
	    $today = Carbon::today()->toDateString();

	    if ($event->event_date !== $today) {
		return response()->json(['error' => 'This is not a Today event'], 422);
	    }

	    $validated = $request->validate([
		'title'       => 'required|string|max:255',
		'event_date'  => "required|date|in:$today",
		'time'        => 'nullable',
		'location'    => 'nullable|string|max:255',
		'description' => 'nullable|string',
	    ]);

	    $event->update($validated);
	    return response()->json($event);
	}

	public function destroyToday($id)
	{
	    $event = Event::findOrFail($id);
	    $today = Carbon::today()->toDateString();

	    if ($event->event_date !== $today) {
		return response()->json(['error' => 'This is not a Today event'], 422);
	    }

	    $event->delete();
	    return response()->json(['message' => 'Today event deleted']);
	}


    ////////////////////////
    // PAST EVENTS CRUD
    ////////////////////////

    public function getPast()
    {
        $events = Event::whereDate('event_date', '<', Carbon::today())->get();
        return response()->json($events);
    }

    public function storePast(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'event_date'  => 'required|date|before:today',
            'time'        => 'nullable',
            'location'    => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $event = Event::create($validated);
        return response()->json($event, 201);
    }

    public function updatePast(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'event_date'  => 'required|date|before:today',
            'time'        => 'nullable',
            'location'    => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $event->update($validated);
        return response()->json($event);
    }

    public function destroyPast($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return response()->json(['message' => 'Past event deleted']);
    }

    ////////////////////////
    // FUTURE EVENTS CRUD
    ////////////////////////

    public function getFuture()
    {
        $events = Event::whereDate('event_date', '>', Carbon::today())->get();
        return response()->json($events);
    }

    public function storeFuture(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'event_date'  => 'required|date|after:today',
            'time'        => 'nullable',
            'location'    => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $event = Event::create($validated);
        return response()->json($event, 201);
    }

    public function updateFuture(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'event_date'  => 'required|date|after:today',
            'time'        => 'nullable',
            'location'    => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $event->update($validated);
        return response()->json($event);
    }

    public function destroyFuture($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return response()->json(['message' => 'Future event deleted']);
    }
}
