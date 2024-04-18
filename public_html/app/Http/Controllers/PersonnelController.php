<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MilitaryPersonnel;
use App\Models\Rank;
use App\Models\RankType;
use App\Models\Speciality;

class PersonnelController extends Controller
{
    function showAddSoldier()
    {
        $ranks = Rank::all();
        $specialities = Speciality::all();

        return view("index", compact("ranks", "specialities"));
    }

    function send(Request $request)
    {
        $validated = $request->validate(
            [
                "surname" => "required",
                "name" => "required",
                "patronimyc" => "required",
                "rank" => "required",
                "speciality" => "required",
            ]
        );

        $credentials = [
            "surname" => $validated["surname"],
            "name" => $validated["name"],
            "patronimyc" => $validated["patronimyc"],
            "rank_id" => $validated["rank"],
            "speciality_id" => $validated["speciality"],
        ];

        MilitaryPersonnel::create($credentials);
        return redirect()->route("index")->with("success", "Успешно добавлено");
    }
}
