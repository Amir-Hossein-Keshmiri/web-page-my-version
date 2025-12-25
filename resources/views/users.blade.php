<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
    <link rel="stylesheet" href="{{ asset('css/users.css') }}">
</head>
<body>
    <div class="container">
        <h1>Users</h1>

        @if(session('message'))
            <p class="message">{{ session('message') }}</p>
        @endif

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user['id'] }}</td>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td class="actions">
                        <button class="posts-btn" onclick="window.location.href='/users/{{ $user['id'] }}/posts'">🖼️ Posts</button>
                        <button class="comments-btn" onclick="window.location.href='/users/{{ $user['id'] }}/comments'">🖹 Comments</button>
                        <button class="edit-btn" onclick="window.location.href='/users/{{ $user['id'] }}/edit'">✏️ Edit</button>

                        <form action="{{ route('users.delete', $user['id']) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button class="delete-btn">🗑️ Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="buttons">
            <button onclick="window.location.href='/'">🏠 Back Home</button>
            <button onclick="window.location.href='/users/create'">➕ Create User</button>
        </div>
    </div>
</body>
</html>
