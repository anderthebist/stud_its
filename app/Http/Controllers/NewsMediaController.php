<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsMedia;
use Illuminate\Support\Facades\Validator;

class NewsMediaController extends Controller
{

    public function index($news_id = 0)
    {
        $news_medias = NewsMedia:: where("news_id",$news_id)->orderBy('created_at','desc')->get();

        if(count($news_medias) === 0){
            return abort(404);
        }
 
        return view("admin.news_media.index",[
            "news_medias" => $news_medias,
            "news_id" => $news_id
        ]);
    }

    public function checkType($type){
        return isset($type) && !in_array($type, ["VIDEO","IMAGE"]);
    }

    public function create(Request $request,$news_id,$type)
    {
        if($this->checkType($type)){
            return redirect("admin/news");
        }

        return view("admin.news_media.create",[
            "type" => $type,
            "news_id" => $news_id
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

            $news_media = new NewsMedia();
            $news_media->news_id = $request->news_id;
            $news_media->type = $request->type;
            $news_media->path = $request->file() ? "/images/".$fileName : $request->path;

            $news_media->save();

            return redirect("admin/news");
        } catch (QueryException $e) {
            return redirect()->back()->withErrors("some_error","Возникла ошибка при оброботке");
        }
    }

    public function valid(Request $request,$isUpdate = false)
    {
        $validator = Validator::make($request->all(),[
                "news_id" => [!$isUpdate ? "required" : "nullable","numeric"],
                "type" => ["required","in:IMAGE,VIDEO"],
                "path" => $request->type === "IMAGE" ? [!$isUpdate ? "required" : "nullable","mimes:jpg,png","max:2048"] : ["required","url"]
            ],
            [
                'news_id.required' => "Возникла ошибка при оброботке",
                'news_id.numeric' => "Возникла ошибка при оброботке",
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


    public function edit($id,$type)
    {
        if($this->checkType($type)){
            return redirect("admin/news");
        }

        $news_media = NewsMedia :: findOrFail($id);

        return view("admin.news_media.edit",[
            "news_media" => $news_media,
            "type" => $type,
            "id" => $id
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->valid($request,true);

        try {
            if($request->file()){
                $fileName = time().'_'.$request->path->getClientOriginalName();
                $request->path->move(public_path('images'), $fileName);
                $update["image"] = "/images/".$fileName;
            }

            if($request->path !== null)
                NewsMedia:: whereId($id)->update(["path" => $request->file() ? "/images/".$fileName : $request->path]);

            return redirect("admin/news");
        } catch (QueryException $e) {
            return redirect()->back()->withErrors("some_error","Возникла ошибка при оброботке");
        }
    }

    public function destroy($id)
    {
        $res = NewsMedia::where('id',$id)->delete();
        return redirect()->back();
    }
}
