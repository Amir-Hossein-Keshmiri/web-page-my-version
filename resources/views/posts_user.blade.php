<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
    <link rel="stylesheet" href="{{ asset('css/users.css') }}">
</head>
<body>
    <div class="container">
        <h1>Posts</h1>

        @if(session('message'))
            <p class="message">{{ session('message') }}</p>
        @endif

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Text</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post['id'] }}</td>
                    <td>{{ $post['text'] }}</td>
                    <td class="actions">
                        <button class="comments-btn" onclick="window.location.href='/users/{{ $post['id'] }}/comments'">🖹 Comments</button>

                        <form action="{{ route('users.posts_delete', $post['id']) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
            <button onclick="window.location.href='/users'">🏠 Back Users</button>
            <button >➕ Create Post</button>
        </div>
    </div>
</body>
</html>
