@extends('admin.layouts.app')

@section('content')
    <h2>Edit Past Event</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-box">
        <form action="{{ route('events.past.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Title:</label>
            <input type="text" name="title" value="{{ $event->title }}" required>

            <label>Description:</label>
            <textarea name="description">{{ $event->description }}</textarea>

            <label>Event Date:</label>
            <input type="date" name="event_date" value="{{ $event->event_date }}" required>

            <label>Time:</label>
            <input type="time" name="time" value="{{ $event->time }}">

            <label>Location:</label>
            <input type="text" name="location" value="{{ $event->location }}">

            <button type="submit">Update</button>
        </form>
    </div>
@endsection

