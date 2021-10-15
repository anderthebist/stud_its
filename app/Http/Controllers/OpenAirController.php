<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OpenAir;
use Illuminate\Support\Facades\Validator;

class OpenAirController extends Controller
{
    public function index()
    {
        $open_images = OpenAir:: where("type", "IMAGE")->orderBy('created_at',"desc")->take(8)->get();
        $open_vidoes = OpenAir:: where("type", "VIDEO")->orderBy('created_at',"desc")->take(2)->get();

        return view("admin.open_air.index",[
            "open_images" => $open_images,
            "open_vidoes" => $open_vidoes
        ]);
    }

    public function store(Request $request)
    {
        $this->valid($request);

        try {
            if($request->file()){
                $fileName = time().'_'.$request->path->getClientOriginalName();
                $request->path->move(public_path('images'), $fileName);
            }

            $open_air = new OpenAir();
            $open_air->type = $request->type;
            $open_air->path = $request->file() ? "/images/".$fileName : $request->path;

            $open_air->save();

            return redirect("admin/open_air");
        } catch (QueryException $e) {
            return redirect()->back()->withErrors("some_error","Возникла ошибка при оброботке");
        }
    }
    
    public function valid(Request $request,$isUpdate = false)
    {
        $validator = Validator::make($request->all(),[
                "type" => ["required","in:IMAGE,VIDEO"],
                "path" => $request->type === "IMAGE" ? [!$isUpdate ? "required" : "nullable","mimes:jpg,png","max:2048"] : ["required","url"]
            ],
            [
                'type.required' => "Возникла ошибка при оброботке",
                'type.in' => "Возникла ошибка при оброботке",
                'path.required' => "Заполните поле",
                'path.mimes' => "Файл не в нужном формате: png,jpg",
                'path.max' => "Максимальный размер файла не долже привышать 2 мб",
                'path.url' => "Ссылка на видео не является валидной"
            ]
        );

        return $validator->validate();
    }

    public function checkType($type){
        return isset($type) && !in_array($type, ["VIDEO","IMAGE"]);
    }

    public function create(Request $request,$type)
    {
        if($this->checkType($type)){
            return redirect("admin/open_air");
        }

        return view("admin.open_air.create",[
            "type" => $type
        ]);
    }

    public function page(Request $request)
    {
        $open_images = OpenAir:: where("type", "IMAGE")->orderBy('created_at',"desc")->take(8)->get();
        $open_vidoes = OpenAir:: where("type", "VIDEO")->orderBy('created_at',"desc")->take(2)->get();

        return view('openair',[
            "header" => $request->header,
            "open_images" => $open_images,
            "open_vidoes" => $open_vidoes
        ]);
    }

    public function edit($id,$type)
    {
        if($this->checkType($type)){
            return redirect("admin/open_air");
        }

        $open_air = OpenAir:: findOrFail($id);
        return view("admin.open_air.edit",[
            "type" => $type,
            "open_air" => $open_air
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->valid($request,true);

        try {
            if($request->file()){
                $fileName = time().'_'.$request->path->getClientOriginalName();
                $request->path->move(public_path('images'), $fileName);

                OpenAir:: whereId($id)->update([
                    "type" => $request->type,
                    "path" => "/images/".$fileName
                ]);
            }else{
                OpenAir:: whereId($id)->update($request->path === null ?["type" => $request->type] : 
                ["type" => $request->type,"path" => $request->path]);
            }

            return redirect("admin/open_air");
        } catch (QueryException $e) {
            return redirect()->back()->withErrors("some_error","Возникла ошибка при оброботке");
        }
    }

    public function destroy($id)
    {
        $res = OpenAir::where('id',$id)->delete();
        return redirect()->back();
    }
}
