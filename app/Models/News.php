<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    public function medias()
    {
        return $this->hasMany('App\Models\NewsMedia')->orderBy('created_at','desc');
    }

    public function date()
    {
        return $this->created_at->format('d.m.Y');
    }

    use HasFactory;
}
