<?php

namespace App\Http\Controllers;

use App\Models\MilitaryBase;
use App\Models\Rank;
use App\Models\Speciality;
use Illuminate\Http\Request;

class MilitaryController extends Controller
{
    function index() {
        return view('index');
    }

    function showRanks() {
        $ranks = Rank::all();

        return view('ranks', compact('ranks'));
    }

    function showSpecs() {
        $specs = Speciality::all();

        return view('Specialities', compact('specs'));
    }

    function showBases() {
        $bases = MilitaryBase::all();

        return view('militaryBases', compact('bases'));
    }
}
