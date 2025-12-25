<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function users()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    public function posts()
    {
        
    }

    public function posts_user()
    {
        $posts = Post::all();
        return view('posts_user', compact('posts'));
    }

    public function posts_create()
    {
        
    }

    public function posts_delete()
    {
        
    }

    public function comments_user()
    {
        
    }

    public function comments_create()
    {
        
    }

    public function comments_delete()
    {
        
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('users.users')->with('message', "User {$request->name} created!");
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,{$id}",
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('users.users')->with('message', "User {$user->name} updated!");
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.users')->with('message', "User {$user->name} deleted!");
    }

    public function usersWithPosts()
    {
        $users = User::select('users.id', 'users.name', DB::raw('COUNT(posts.id) as posts_count'))
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->groupBy('users.id', 'users.name')
            ->having('posts_count', '>=', 3)
            ->get();

        return view('users_with_posts', compact('users'));
    }
}
