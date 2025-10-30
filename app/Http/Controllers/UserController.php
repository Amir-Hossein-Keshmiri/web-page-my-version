<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    private $users = [
        ['id' => 1, 'name' => 'Amir Hossein', 'email' => 'amir@example.com'],
        ['id' => 2, 'name' => 'Sara', 'email' => 'sara@example.com'],
        ['id' => 3, 'name' => 'Ali', 'email' => 'ali@example.com'],
    ];

    public function users()
    {
        $users = $this->users;
        return view('users', compact('users'));
    }

    public function create()
    {
        return view('create');
    }

    public function edit($id)
    {
        $user = collect($this->users)->firstWhere('id', $id);

        if (!$user) {
            return redirect()->route('users.users')->with('message', "User with ID {$id} not found!");
        }

        return view('edit', compact('user'));
    }

    public function delete($id)
    {
        return redirect()->route('users.users')->with('message', "User with ID {$id} deleted!");
    }
}
