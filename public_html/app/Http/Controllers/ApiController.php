<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Corpus;
use App\Models\Division;

class ApiController extends Controller
{
    public function getCorpuses(Request $request)
    {
        $corpuses = Corpus::where('army_id', $request->army_id)->get();
        return response()->json(['corpuses' => $corpuses]);
    }

    public function getDivisions(Request $request)
    {
        $divisions = Division::where('corpus_id', $request->corpus_id)->get();
        return response()->json(['divisions' => $divisions]);
    }
}
