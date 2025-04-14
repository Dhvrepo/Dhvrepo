<!DOCTYPE html>
<html>
<head>
    <title>Admin - Event List</title>
    <style>
        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
        }

        .sidebar {
            width: 220px;
            background-color: #343a40;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 30px;
            color: #fff;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: block;
            color: #ccc;
            padding: 12px 20px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #495057;
            color: #fff;
        }

        .content {
            margin-left: 220px;
            padding: 40px;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }

        th {
            background-color: #212529;
            color: white;
        }

        .btn {
            padding: 8px 14px;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            text-decoration: none;
            margin-right: 5px;
        }

        .btn-add {
            background-color: #28a745;
        }

        .btn-edit {
            background-color: #007bff;
        }

        .btn-delete {
            background-color: #dc3545;
        }

        form {
            display: inline;
        }

        .top-bar {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .profile {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
            border: 2px solid #fff;
        }

        .profile p {
            margin: 0;
            font-weight: bold;
            color: #fff;
        }

    </style>
</head>
<body>
       
    <div class="sidebar">
         <div class="profile">
            <img src="https://media.istockphoto.com/id/2014684899/vector/placeholder-avatar-female-person-default-woman-avatar-image-gray-profile-anonymous-face.jpg?s=612x612&w=0&k=20&c=D-dk9ek0_jb19TiMVNVmlpvYVrQiFiJmgGmiLB5yE4w=" alt="Profile Image">
            <p>Dhvani User</p>
        </div>
        <a href="{{ route('events.past') }}">Past's Events</a>
        <a href="{{ route('events.index') }}">Today's Events</a>
        <a href="{{ route('events.future') }}">Future's Events</a>
    </div>

    <div class="content">
        <div class="card">
            <div class="top-bar">
                <h1> Future's Event List</h1>
                <a href="{{ route('events.future.create') }}" class="btn btn-add">+ Add Future's Event</a>
            </div>

            @if(session('success'))
                <p style="color: green;">{{ session('success') }}</p>
            @endif

            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Location</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->description }}</td>
                            <td>{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</td>
                            <td>{{ $event->time }}</td>
                            <td>{{ $event->location }}</td>
                            <td>
                                <a href="{{ route('events.future.edit', $event->id) }}" class="btn btn-edit">Edit</a>
                                <form action="{{ route('events.future.destroy', $event->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

</body>
</html>

