<?php

namespace App\Modules\Front\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tintuc;

class LangController extends Controller
{
    public function getContact()
    {
        return view('Front::pages.lang');
    }

    public function getNews()
    {
        $tin = Tintuc::all();
        return view('Front::pages.news', compact('tin'));
    }

    public function getNewsdetail(Tintuc $tintuc, $slug = null){
        if($slug){
            $news_detail = $tintuc->whereTranslation('slug', $slug)->first();
            return view('Front::pages.news-detail', compact('news_detail'));
        }
    }

    public function creatNews(){
        $data = [
                'en' => ['title' => 'How are you', 'slug' => \LP_lib::Unicode('How are you'), 'content' => 'Lorem  text'],
                'vi' => ['title' => 'Khỏe không', 'slug' => \LP_lib::Unicode('Khỏe không'), 'content' => 'Bạn có khỏe không'],
        ];
        $tin = new Tintuc;
        $tin->fill($data);
        $tin->save();


        return redirect()->route('f.news');
    }
}
