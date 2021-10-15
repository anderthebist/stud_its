<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudCurators;

class HomeController extends Controller
{
    public function show(Request $request)
    {  
        $stud_curators = StudCurators:: orderBy('id',"desc")->take(6)->get();

        return view('index',[
            "header" => $request->header,
            "stud_curators" => $stud_curators
        ]);
    }
}
