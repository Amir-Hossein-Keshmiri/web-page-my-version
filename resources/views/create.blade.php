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

        <form onsubmit="return submitForm();">
            <div class="form-group">
                <input type="text" id="name" placeholder="Full Name" required>
            </div>
            <div class="form-group">
                <input type="email" id="email" placeholder="Email Address" required>
            </div>

            <div class="buttons">
                <button type="submit" class="add-btn">➕ Add User</button>
                <button type="button" class="back-btn" onclick="window.location.href='/users'">← Back to List</button>
            </div>
        </form>
    </div>

    <script>
        function submitForm() {
            alert('✅ User created successfully (simulation)');
            window.location.href = '/users';
            return false;
        }
    </script>
</body>
</html>
