<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudCurators;
use Illuminate\Support\Facades\Validator;

class StudCuratorsController extends Controller
{

    public function index()
    {
        $stud_curators = StudCurators:: orderBy('id',"desc")->take(6)->get();

        return view("admin.stud_curators.index",[
            "stud_curators" => $stud_curators
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
                "image" => ["required","mimes:jpg,png","max:2048"]
            ],
            [
                'image.required' => "Выберете файл",
                'image.mimes' => "Файл не в нужном формате: png,jpg",
                'image.max' => "Максимальный размер файла не долже привышать 2 мб"
            ]
        );

        $validator->validate();

        try {
            $fileName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $fileName);

            $stud_curator = new StudCurators();
            $stud_curator->image = "/images/".$fileName;
            $stud_curator->save();

            return redirect("admin/stud_curators");
        } catch (QueryException $e) {
            return redirect()->back()->withErrors("some_error","Возникла ошибка при оброботке");
        }
    }

    public function edit($id)
    {
        $stud_curator = StudCurators:: findOrFail($id);
        return view("admin.stud_curators.edit",[
            "stud_curator" => $stud_curator
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'image' => ["required","mimes:jpg,png","max:2048"]
            ], 
            [
                'image.required' => "Выберете файл",
                'image.mimes' => "Файл не в нужном формате: png,jpg",
                'image.max' => "Максимальный размер файла не долже привышать 2 мб"
        ]);
        $validator->validate();

        try {
            $fileName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $fileName);

            StudCurators:: whereId($id)->update(["image" => "/images/".$fileName]);

            return redirect("admin/stud_curators");
        } catch (QueryException $e) {
            return redirect()->back()->withErrors("some_error","Возникла ошибка при оброботке");
        }
    }

    public function destroy($id)
    {
        $res = StudCurators::where('id',$id)->delete();
        return redirect()->back();
    }
}
