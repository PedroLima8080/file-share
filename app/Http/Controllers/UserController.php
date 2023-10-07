<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::orderBy('approved', 'desc')->orderBy('created_at', 'asc')->get();
        return view('user.index', ['users' => $users]);
    }

    public function release($userId) {
        $user = User::findOrFail($userId);
        $user->update([
            'approved' => true
        ]);
        return redirect()->route('user.index')->with('Usuário liberado com sucesso');
    }

    public function block($userId) {
        $user = User::findOrFail($userId);
        $user->update([
            'approved' => false
        ]);
        return redirect()->route('user.index')->with('Usuário bloqueado com sucesso');
    }
}
