@extends('admin.layouts.app')

@section('content')
<div class="card" style="padding:20px; background:#fff; border-radius:10px; box-shadow:0 0 15px rgba(0,0,0,0.1);">
    <div class="top-bar" style="display:flex; justify-content: space-between; align-items: center; margin-bottom:20px;">
        <h1 style="margin:0; font-size:24px;">Past Event List</h1>
        <a href="{{ route('events.past.create') }}" class="btn btn-add" 
           style="padding:10px 20px; background-color:#28a745; color:#fff; text-decoration:none; border-radius:5px;">
           + Add Past Event
        </a>
    </div>

    @if(session('success'))
        <p style="color: green; font-weight:bold; margin-bottom:20px;">{{ session('success') }}</p>
    @endif

    <table style="width:100%; border-collapse:collapse; margin-top:20px;">
        <thead>
            <tr style="background-color:#343a40; color:#fff;">
                <th style="padding:12px; border:1px solid #ddd;">Title</th>
                <th style="padding:12px; border:1px solid #ddd;">Description</th>
                <th style="padding:12px; border:1px solid #ddd;">Date</th>
                <th style="padding:12px; border:1px solid #ddd;">Time</th>
                <th style="padding:12px; border:1px solid #ddd;">Location</th>
                <th style="padding:12px; border:1px solid #ddd;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td style="padding:12px; border:1px solid #ddd;">{{ $event->title }}</td>
                    <td style="padding:12px; border:1px solid #ddd;">{{ $event->description }}</td>
                    <td style="padding:12px; border:1px solid #ddd;">{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</td>
                    <td style="padding:12px; border:1px solid #ddd;">{{ $event->time }}</td>
                    <td style="padding:12px; border:1px solid #ddd;">{{ $event->location }}</td>
                    <td style="padding:12px; border:1px solid #ddd;">
                        <a href="{{ route('events.past.edit', $event->id) }}" class="btn btn-edit"
                           style="padding:5px 10px; background-color:#007bff; color:#fff; text-decoration:none; border-radius:5px; margin-right:5px;">
                           Edit
                        </a>
                        <form action="{{ route('events.past.destroy', $event->id) }}" method="POST" style="display:inline;">
                            @csrf 
                            @method('DELETE')
                            <button class="btn btn-delete" onclick="return confirm('Are you sure?')"
                                    style="padding:5px 10px; background-color:#dc3545; color:#fff; border:none; border-radius:5px; cursor:pointer;">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
