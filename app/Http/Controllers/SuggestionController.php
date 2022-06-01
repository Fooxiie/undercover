<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuggestionController extends Controller
{
    public function show()
    {
        $suggestions = Auth::user()->suggestion;
        if ($suggestions == null) {
            $suggestions = array();
        }
        return view('suggestion.suggestion', compact('suggestions'));
    }

    public function create()
    {
        return view('suggestion.suggestion_create');
    }

    public function submit(Request $request)
    {
        dd($request);
    }
}
