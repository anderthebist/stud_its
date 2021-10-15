<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index(){
        $students = Students :: all();

        return view("admin.stud.index",[
            "students" =>  $students
        ]);
    }

    public function create(){
        return view("admin.stud.create");
    }

    public function store(Request $request)
    {
        $this->valid($request);

        try {
            $fileName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $fileName);

            $students = new Students();
            $students->fullname = $request->fullname;
            $students->status = $request->status;
            $students->image = "/images/".$fileName;
            $students->description = $request->description;
            $students->telegram = $request->telegram;
            $students->instagram = $request->instagram;
            $students->twitter = $request->twitter;

            $students->save();

            return redirect("admin/stud");
        } catch (QueryException $e) {
            return redirect()->back()->withErrors("some_error","Возникла ошибка при оброботке");
        }
    }

    public function valid(Request $request,$isUpdate = false)
    {
        $validator = Validator::make($request->all(),[
                "fullname" => ["required","max:80"],
                "status" => ["required","max:80"],
                "image" => [$isUpdate ? "nullable" : "required","mimes:jpg,png","max:2048"],
                "description" => ["required"],
                "telegram" => ["nullable","url"],
                "instagram" => ["nullable","url"],
                "twitter" => ["nullable","url"]
            ],
            [
                'fullname.required' => "Заполните имя",
                'fullname.max' => "Максимальное количество символов в имени не должно привышать 80",
                'status.required' => "Заполните статус",
                'status.max' => "Максимальное количество символов в статусе не должно привышать 80",
                'image.required' => "Выберете файл",
                'image.mimes' => "Файл не в нужном формате: png,jpg",
                'image.max' => "Максимальный размер файла не долже привышать 2 мб",
                'description.required' => "Заполните описание",
                'telegram.url' => "Ссылка на telegram не является валидной",
                'instagram.url' => "Ссылка на instagram не является валидной",
                'twitter.url' => "Ссылка на twitter не является валидной"
            ]
        );

        return $validator->validate();
    }

    public function page(){
        $students = Students :: all();

        return view("stud",[
            "students" =>  $students
        ]);
    }

    public function edit($id){
        $student = Students :: findOrFail($id);

        return view("admin.stud.edit",[
            "student" =>  $student
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->valid($request,true);

        try {
            $update = [
                "fullname" =>  $request->fullname,
                "status" => $request->status,
                "description" => $request->description,
                "telegram" => $request->telegram,
                "instagram" => $request->instagram,
                "twitter" => $request->twitter
            ];

            if($request->file()){
                $fileName = time().'_'.$request->image->getClientOriginalName();
                $request->image->move(public_path('images'), $fileName);
                $update["image"] = "/images/".$fileName;
            }

            Students:: whereId($id)->update($update);

            return redirect("admin/stud");
        } catch (QueryException $e) {
            return redirect()->back()->withErrors("some_error","Возникла ошибка при оброботке");
        }
    }

    public function destroy($id)
    {
        $res = Students::where('id',$id)->delete();
        return redirect()->back();
    }
}
