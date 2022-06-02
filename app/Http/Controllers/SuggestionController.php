<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuggestionController extends Controller
{
    public function show()
    {
        $suggestions = Auth::user()->suggestions;
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
        $suggestion = new Suggestion();
        $suggestion->user_id = Auth::user()->id;
        $suggestion->group_name = $request->input('group_name');
        $suggestion->themes_json = json_encode($request->input('themes'));
        $suggestion->state = "En attente";
        $suggestion->save();
        return redirect(route('suggestion.show'));
    }
}
