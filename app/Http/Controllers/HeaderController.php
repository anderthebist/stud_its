<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Header;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\QueryException;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $headers = Header:: all();
        return view("admin.headers.index",[
            "headers" => $headers
        ]);
    }


    public function edit($id)
    {   
        try {
            $header = Header:: findOrFail($id);
        } catch (ModelNotFoundException $ex) {
            return abort(404);
        }

        return view("admin.headers.edit",[
            "header" => $header
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'title' => ['required', 'string', 'max:40'],
            'image' => ["nullable","mimes:jpg,png","max:2048"]
            ], 
            [
                'title.required' => "Заполните название",
                'title.string' => "Название шапки должно быть строковым",
                'title.max' => "Максимальное количество символов не должно привышать 40",
                'image.mimes' => "Файл не в нужном формате: png,jpg",
                'image.max' => "Максимальный размер файла не долже привышать 2 мб"
        ]);
        $validator->validate();

        try {
            if($request->file()) {
                $fileName = time().'_'.$request->image->getClientOriginalName();
                $request->image->move(public_path('images'), $fileName);
            }

            Header:: whereId($id)->update($request->file() ? ["title" => $request->title,"image" => "/images/".$fileName] : 
                ["title" => $request->title]);

            return redirect("admin/header");
        } catch (QueryException $e) {
            return redirect()->back()->withErrors("some_error","Возникла ошибка при оброботке");
        }
    }
}
