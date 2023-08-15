<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    function users() {
        $users = User::with('insurance')->get();

        return view('relations.users', compact('users'));
    }
}
