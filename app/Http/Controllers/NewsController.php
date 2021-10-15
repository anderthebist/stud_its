<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index()
    {
        $news = News:: orderBy('created_at','desc')->get();

        return view('admin.news.index',[
            "news" => $news
        ]);
    }

    public function store(Request $request)
    {
        $this->valid($request);

        try {

            $news = new News();
            $news->title = $request->title;
            $news->text = $request->text;

            $news->save();

            return redirect("admin/news");
        } catch (QueryException $e) {
            return redirect()->back()->withErrors("some_error","Возникла ошибка при оброботке");
        }
    }

    public function valid(Request $request,$isUpdate = false)
    {
        $validator = Validator::make($request->all(),[
                "title" => ["required","max:80"],
                "text" => ["required"]
            ],
            [
                'title.required' => "Заполните название новостиы",
                'title.max' => "Максимальное количество символов в названии не должно привышать 80",
                'text.required' => "Заполните текст"
            ]
        );

        return $validator->validate();
    }

    public function show(Request $request)
    {
        $news = News:: orderBy('created_at','desc')->get();

        return view('news',[
            "header" => $request->header,
            "news" => $news
        ]);
    }

    public function edit($id){
        $news = News :: findOrFail($id);

        return view("admin.news.edit",[
            "news" =>  $news
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->valid($request,true);

        try {
            News:: whereId($id)->update([
                "title" =>  $request->title,
                "text" => $request->text
            ]);

            return redirect("admin/news");
        } catch (QueryException $e) {
            return redirect()->back()->withErrors("some_error","Возникла ошибка при оброботке");
        }
    }

    public function destroy($id)
    {
        $res = News::where('id',$id)->delete();
        return redirect()->back();
    }
}
