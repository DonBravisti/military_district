<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnel;

class PersonnelController extends Controller
{
    function send(Request $request){
        $validated = $request->validate(
            [
                "surname"=> "surname",
                "name"=> "name",
                "patronimyc"=> "patronimyc"
            ]
        );

        Personnel::create($validated);
        echo 'done';
    }
}
