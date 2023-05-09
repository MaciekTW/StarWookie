<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\characters;


class AutocompleteController extends Controller
{
    public function index()
    {
        return view('autocomplete-search');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request)
    {
        $res = characters::select("name")
            ->where("name","LIKE","%{$request->term}%")
            ->get();

        return response()->json($res);
    }
}
