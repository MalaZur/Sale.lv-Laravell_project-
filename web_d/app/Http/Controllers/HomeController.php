<?php

namespace App\Http\Controllers;

use App\Models\UserQuery;

class HomeController extends Controller
{
    public function index()
    {
        $userQueries = UserQuery::all();

        return view('main_page')->with('userQueries', $userQueries);
    }
}