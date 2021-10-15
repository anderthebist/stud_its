<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AbitVideos;
use Illuminate\Support\Facades\Validator;

class AbitController extends Controller
{
    public function index()
    {
        $abit_videos = AbitVideos:: orderBy('id','desc')->take(4)->get();
        return view("admin.abit_fest.index",[
            "abit_videos" => $abit_videos
        ]);
    }

    public function store(Request $request)
    {
        $this->valid($request);

        try {
            $fileName = time().'_'.$request->poster->getClientOriginalName();
            $request->poster->move(public_path('images'), $fileName);

            $fest = new AbitVideos();
            $fest->video_path = $request->video_path;
            $fest->poster = "/images/".$fileName;

            $fest->save();

            return redirect("admin/abit_fest");
        } catch (QueryException $e) {
            return redirect()->back()->withErrors("some_error","Возникла ошибка при оброботке");
        }
    }

    public function page(Request $request)
    {
        $abit_videos = AbitVideos:: orderBy('id','desc')->take(4)->get();

        return view('abit',[
            "header" => $request->header,
            "abit_videos" => $abit_videos
        ]);
    }

    public function valid(Request $request,$isUpdate = false)
    {
        $validator = Validator::make($request->all(),[
                "video_path" => ["required","url"],
                "poster" => [$isUpdate ? "nullable" : "required","mimes:jpg,png","max:2048"]
            ],
            [
                'video_path.required' => "Введите ссылку",
                'video_path.url' => "Ссылка на видео не является валидной",
                'poster.required' => "Выберете файл",
                'poster.mimes' => "Файл не в нужном формате: png,jpg",
                'poster.max' => "Максимальный размер файла не долже привышать 2 мб"
            ]
        );

        return $validator->validate();
    }
    
    public function edit($id)
    {
        $abit_video = AbitVideos:: findOrFail($id);
        return view("admin.abit_fest.edit",[
            "abit_video" => $abit_video
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->valid($request,true);

        try {
            $update = [
                "video_path" =>  $request->video_path
            ];

            if($request->file()){
                $fileName = time().'_'.$request->poster->getClientOriginalName();
                $request->poster->move(public_path('images'), $fileName);
                $update["poster"] = "/images/".$fileName;
            }

            AbitVideos:: whereId($id)->update($update);

            return redirect("admin/abit_fest");
        } catch (QueryException $e) {
            return redirect()->back()->withErrors("some_error","Возникла ошибка при оброботке");
        }
    }

    public function destroy($id)
    {
        $res = AbitVideos::where('id',$id)->delete();
        return redirect()->back();
    }
}
