<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //  All Roles Show

    public function index()
    {
        return  view('backend.roles');
    }


    //Role Store

    public function store(Request $request)
    {



        return Role::create([

            'name'      => $request -> name,
            'slug'      => Str::slug($request -> name),
            'permission'    => json_encode($request -> per),
        ]);



    }


}
