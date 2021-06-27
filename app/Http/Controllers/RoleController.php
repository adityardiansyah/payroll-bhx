<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $data = Role::latest()->get();

        return view('app.role.index', compact('data'));
    }
}
