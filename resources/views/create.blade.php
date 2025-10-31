<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create User</title>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<body>
    <div class="container">
        <h1>Create New User</h1>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" name="name" placeholder="Full Name" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email Address" required>
            </div>

            <div class="buttons">
                <button type="submit" class="add-btn">➕ Add User</button>
                <button type="button" class="back-btn" onclick="window.location.href='{{ route('users.users') }}'">← Back to List</button>
            </div>
        </form>
    </div>
</body>
</html>
