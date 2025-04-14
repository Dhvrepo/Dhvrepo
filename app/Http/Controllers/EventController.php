<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'time' => 'nullable',
            'location' => 'nullable|string|max:255',
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'time' => 'nullable',
            'location' => 'nullable|string|max:255',
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
    
    // PAST EVENTS
	public function indexPast()
	{
	    $events = Event::where('event_date', '<', now()->toDateString())->get();
	    return view('admin.events.past.index', compact('events'));
	}


	public function createPast()
	{
	    return view('admin.events.past.create');
	}

	public function storePast(Request $request)
	{
	    $this->validate($request, [
		'title' => 'required|string|max:255',
		'event_date' => 'required|date|before:today',
		'time' => 'nullable',
		'location' => 'nullable|string|max:255',
	    ]);

	    Event::create($request->all());
	    return redirect()->route('events.past')->with('success', 'Past event created.');
	}

	public function editPast(Event $event)
	{
	    return view('admin.events.past.edit', compact('event'));
	}

	public function updatePast(Request $request, Event $event)
	{
	    $this->validate($request, [
		'title' => 'required|string|max:255',
		'event_date' => 'required|date|before:today',
		'time' => 'nullable',
		'location' => 'nullable|string|max:255',
	    ]);

	    $event->update($request->all());
	    return redirect()->route('events.past')->with('success', 'Past event updated.');
	}

	public function destroyPast(Event $event)
	{
	    $event->delete();
	    return redirect()->route('events.past')->with('success', 'Past event deleted.');
	}

	// FUTURE EVENTS
	public function future()
	{
	    $events = Event::whereDate('event_date', '>', Carbon::today())->get();
	    return view('admin.events.future.index', compact('events'));
	}

	public function createFuture()
	{
	    return view('admin.events.future.create');
	}

	public function storeFuture(Request $request)
	{
	    $this->validate($request, [
		'title' => 'required|string|max:255',
		'event_date' => 'required|date|after:today',
		'time' => 'nullable',
		'location' => 'nullable|string|max:255',
	    ]);

	    Event::create($request->all());
	    return redirect()->route('events.future')->with('success', 'Future event created.');
	}

	public function editFuture(Event $event)
	{
	    return view('admin.events.future.edit', compact('event'));
	}

	public function updateFuture(Request $request, Event $event)
	{
	    $this->validate($request, [
		'title' => 'required|string|max:255',
		'event_date' => 'required|date|after:today',
		'time' => 'nullable',
		'location' => 'nullable|string|max:255',
	    ]);

	    $event->update($request->all());
	    return redirect()->route('events.future')->with('success', 'Future event updated.');
	}

	public function destroyFuture(Event $event)
	{
	    $event->delete();
	    return redirect()->route('events.future')->with('success', 'Future event deleted.');
	}
}

