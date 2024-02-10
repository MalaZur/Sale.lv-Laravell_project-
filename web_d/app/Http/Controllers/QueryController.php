<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserQuery;

class QueryController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'query' => 'required',
            'description' => 'required',
        ]);

        $userQuery = new UserQuery;
        $userQuery->q_title = $validatedData['query'];
        $userQuery->q_description = $validatedData['description'];
        $userQuery->nickname_id = $request->session()->get('user_id');
        $userQuery->nickname = $request->session()->get('nickname');
        $userQuery->save();

        $userQueries = UserQuery::all();

        return redirect('/')->with('userQueries', $userQueries)->with('success', 'Query created successfully.');
    }
    public function destroy(UserQuery $userQuery)
    {

        $userQuery->delete();
        return redirect('/')->with('success', 'Query deleted successfully.');

    }
}
