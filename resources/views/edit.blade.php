<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="text" name="name" placeholder="Enter name" value="{{ $user->name }}" required>
            <input type="email" name="email" placeholder="Enter email" value="{{ $user->email }}" required>

            <button type="submit">Update</button>
        </form>

        <button class="back-btn" onclick="window.location.href='/users'">Back to list</button>
    </div>

    <script>
        function updateUser() {
            alert('User updated successfully (simulation)');
            window.location.href = '/users';
            return false;
        }
    </script>
</body>
</html>
