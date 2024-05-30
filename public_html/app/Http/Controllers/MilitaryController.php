<?php

namespace App\Http\Controllers;

use App\Models\Army;
use App\Models\Corpus;
use App\Models\Division;
use App\Models\MilitaryBase;
use App\Models\Rank;
use App\Models\Speciality;
use Illuminate\Http\Request;

class MilitaryController extends Controller
{
    function index()
    {
        return view('index');
    }

    function showRanks()
    {
        $ranks = Rank::all();

        return view('ranks', compact('ranks'));
    }

    function showRankPersonnel($id) {
        $rank = Rank::find($id);
        $personnel = $rank->militaryPersonnel;

        return view("personnel", compact("personnel"));
    }

    function showSpecs()
    {
        $specs = Speciality::all();

        return view('Specialities', compact('specs'));
    }

    function showSpecPersonnel($id)
    {
        $spec = Speciality::find($id);
        $personnel = $spec->militaryPersonnel;

        return view("personnel", compact("personnel"));
    }

    function showBases()
    {
        $armies = Army::all();
        $corpuses = Corpus::all();
        $divisions = Division::all();
        $bases = MilitaryBase::all();

        return view('militaryBases', compact('armies', 'corpuses', 'divisions', 'bases'));
    }

    function showBaseDescription($id)
    {
        $base = MilitaryBase::find($id);

        return view('militaryBase', compact('base'));
    }

    public function filter(Request $request)
    {
        $armies = Army::all();
        $corpuses = Corpus::all();
        $divisions = Division::all();

        $query = MilitaryBase::query();

        if ($request->army && $request->army != '0') {
            $query->whereHas('brigade.division.corpus.army', function ($q) use ($request) {
                $q->where('id', $request->army);
            });
        }

        if ($request->corpus && $request->corpus != '0') {
            $query->whereHas('brigade.division.corpus', function ($q) use ($request) {
                $q->where('id', $request->corpus);
            });
        }

        if ($request->division && $request->division != '0') {
            $query->whereHas('brigade.division', function ($q) use ($request) {
                $q->where('id', $request->division);
            });
        }

        $bases = $query->get();

        return view('militaryBases', compact('armies', 'corpuses', 'divisions', 'bases'));
    }


    // function filter(Request $request) {
    //     $armies = Army::all();
    //     $corpuses = Corpus::all();
    //     $divisions = Division::all();

    //     $divisionId = $request->input('division');
    //     if ($divisionId == '0') {
    //         $bases = MilitaryBase::all();
    //         return view('militaryBases', compact('armies', 'corpuses', 'divisions', 'bases'));
    //     }
    //     $division = Division::with('brigades.militaryBases')->findOrFail($divisionId);

    //     // Собрать все военные базы в одну коллекцию
    //     $bases = $division->brigades->flatMap(function ($brigade) {
    //         return $brigade->militaryBases;
    //     });

    //     return view('militaryBases', compact('armies', 'corpuses', 'divisions', 'bases'));
    // }
}
