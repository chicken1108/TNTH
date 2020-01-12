<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\banner;
use App\Model\news;
use App\Model\document;

class HomeController extends Controller
{
    public function getIndex()
    {
    	$data['list_banner'] = banner::orderBy('ban_active','desc')->take(4)->get();
    	return view('index', $data);
    }

    public function getListNews($cate_id)
    {
    	$data['list_news'] = news::where('news_cateid','=',$cate_id)->paginate(5);
    	return view('pages.list_news', $data);
    }

    public function getNewsDetail($cate_slug, $news_slug, $news_id)
    {
    	$data['news_detail'] = news::find($news_id);
   		return view('pages.news_detail', $data);
    }

    public function getDocument($doc_id, $doc_slug)
    {
        $data['document_detail'] = document::find($doc_id);
        return view('pages.reader', $data);
    }

}
