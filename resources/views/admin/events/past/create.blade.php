@extends('admin.layouts.app')

@section('content')
    <h2>Create Past Event</h2>

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
        <form action="{{ route('events.past.store') }}" method="POST">
            @csrf

            <label>Title:</label>
            <input type="text" name="title" required>

            <label>Description:</label>
            <textarea name="description"></textarea>

            <label>Event Date:</label>
            <input type="date" name="event_date" required>

            <label>Time:</label>
            <input type="time" name="time">

            <label>Location:</label>
            <input type="text" name="location">

            <button type="submit">Save</button>
        </form>
    </div>
@endsection
