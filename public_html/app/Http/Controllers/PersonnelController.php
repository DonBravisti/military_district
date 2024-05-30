<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
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

        return view("addSoldier", compact("ranks", "specialities"));
    }

    function showPersonnel($id = null)
    {
        if ($id == null) {
            $personnel = MilitaryPersonnel::all();
            return view("personnel", compact("personnel"));
        }

        $personnel = new Collection;
        $correspondingRanks = RankType::findOrFail($id)->ranks;
        foreach ($correspondingRanks as $rank) {
            $personnel = $personnel->merge($rank->militaryPersonnel);
            // print_r($rank->militaryPersonnel);
        }
        // print_r($personnel->toArray());
        return view("personnel", compact("personnel"));
    }

    function showRankTypes()
    {
        $rankTypes = RankType::all();

        return view('rankTypes', compact('rankTypes'));
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
        return redirect()->route("add-soldier")->with("success", "Успешно добавлено");
    }

    function showUpdateSoldier($id)
    {
        $soldier = MilitaryPersonnel::find($id);
        $ranks = Rank::all();
        $specialities = Speciality::all();

        return view("updateSoldier", compact("ranks", "specialities", "soldier"));
    }

    function update(Request $request, $id)
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

        $soldier =MilitaryPersonnel::find($id);
        $soldier->update($credentials);
        return redirect()->route("personnel")->with("success", "Успешно добавлено");
    }

    public function search(Request $request)
    {
        $rankStr = $request->input('rank_search');
        $rank = Rank::where('title', $rankStr)->first();

        if ($rank == null) {
            $personnel = MilitaryPersonnel::all();
            return back()->withErrors('Неизвестное звание');
        }

        $rankId = $rank->id;
        $personnel = MilitaryPersonnel::all()->where('rank_id', $rankId);

        // echo $personnel;

        return view('personnel', compact('personnel'));
    }

    function removeSoldier($id)
    {
        MilitaryPersonnel::destroy($id);
        return redirect()->route('personnel');
    }
}
