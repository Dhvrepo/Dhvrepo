<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f6f9;
        margin: 0;
        padding: 0;
    }
    .sidebar {
        width: 200px;
        background-color: #343a40;
        height: 100vh;
        color: white;
        padding-top: 30px;
        position: fixed;
        top: 0;
        left: 0;
    }
    .sidebar a {
        color: white;
        padding: 15px 20px;
        display: block;
        text-decoration: none;
        font-size: 16px;
    }
    .sidebar a:hover {
        background-color: #495057;
    }
    .main-content {
        margin-left: 220px;
        padding: 40px;
    }
    .form-box {
        background: white;
        padding: 30px;
        border-radius: 10px;
        max-width: 600px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    label {
        display: block;
        margin-top: 15px;
        font-weight: bold;
    }
    input, textarea {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }
    button {
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
    }
    button:hover {
        background-color: #0069d9;
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

<div class="main-content">
    @yield('content')
</div>

</body>
</html>
