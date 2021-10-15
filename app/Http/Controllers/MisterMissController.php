<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MisterMiss;
use Illuminate\Support\Facades\Validator;

class MisterMissController extends Controller
{
    public function mister(Request $request)
    {
        $items = MisterMiss:: where("type", "Mister")->orderBy('created_at')->get();

        return view('mister',[
            "header" => $request->header,
            "items" => $items
        ]);
    }

    public function miss(Request $request)
    {
        $items = MisterMiss:: where("type", "Miss")->orderBy('created_at')->get();

        return view('mister',[
            "header" => $request->header,
            "items" => $items
        ]);
    }

    public function index()
    {
        $misters = MisterMiss:: where("type", "Mister")->orderBy('created_at')->get();
        $misses = MisterMiss:: where("type", "Miss")->orderBy('created_at')->get();
        return view("admin.mister_miss.index",[
            "misters" => $misters,
            "misses" => $misses
        ]);
    }

    public function store(Request $request)
    {
        $this->valid($request);

        try {
            $fileName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $fileName);

            $item = new MisterMiss();
            $item->type = $request->type;
            $item->title = $request->title;
            $item->special = $request->theme;
            $item->poster = "/images/".$fileName;
            $item->video = $request->promo;
            $item->full_movie = $request->full_movie;
            $item->photos = $request->link_photos;
            $item->videos = $request->link_videos;

            $item->save();

            return redirect("admin/mister_miss");
        } catch (QueryException $e) {
            return redirect()->back()->withErrors("some_error","Возникла ошибка при оброботке");
        }
    }

    public function valid(Request $request,$isUpdate = false)
    {
        $messages = [
            'title.required' => "Заполните название",
            'title.max' => "Максимальное количество символов не должно привышать 30",
            'theme.max' => "Максимальное количество символов не должно привышать 30",
            'image.mimes' => "Файл не в нужном формате: png,jpg",
            'image.max' => "Максимальный размер файла не долже привышать 2 мб",
            'promo.required' => "Добавьте промо ролик",
            'promo.url' => "Ссылка на промо ролик не является валидной",
            'full_movie.url' => "Ссылка на полное видео не является валидной",
            'link_photos.url' => "Ссылка на фото не является валидной",
            'link_videos.url' => "Ссылка на другие видео не является валидной"
        ];

        if(!$isUpdate) $messages['image.required'] = "Выберете файл";

        $validator = Validator:: make($request->all(),[
            "title" => ['required', 'max:30'],
            "theme" => ['nullable', 'max:30'],
            'image' => [$isUpdate ?  "nullable" : "required","mimes:jpg,png","max:2048"],
            "promo" => ['required', 'url'],
            "full_movie" => ['nullable', 'url'],
            "link_photos" => ['nullable', 'url'],
            "link_videos" => ['nullable', 'url']
        ],$messages);

        return $validator->validate();
    }
    
    public function edit($id)
    {
        $item = MisterMiss:: findOrFail($id);
        return view("admin.mister_miss.edit",[
            "item" => $item
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->valid($request,true);

        try {
            $update = [
                "title" =>  $request->title,
                "special" => $request->theme,
                "type" => $request->type,
                "video" => $request->promo,
                "full_movie" => $request->full_movie,
                "photos" => $request->link_photos,
                "videos" => $request->link_videos
            ];

            if($request->file()){
                $fileName = time().'_'.$request->image->getClientOriginalName();
                $request->image->move(public_path('images'), $fileName);
                $update["poster"] = "/images/".$fileName;
            }

            MisterMiss:: whereId($id)->update($update);

            return redirect("admin/mister_miss");
        } catch (QueryException $e) {
            return redirect()->back()->withErrors("some_error","Возникла ошибка при оброботке");
        }
    }

    public function destroy($id)
    {
        $res = MisterMiss::where('id',$id)->delete();
        return redirect()->back();
    }
}
