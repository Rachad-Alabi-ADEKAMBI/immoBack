<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function users()
    {
        return view('pages/back/admin/users');
    }

    public function usersApi()
    {
        $data = User::orderByDesc('id')->get();

        return response()->json($data);
    }

    public function userApi($id)
    {
        $data = User::find($id);

        return response()->json($data);
    }
}
