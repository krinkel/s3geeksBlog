<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMe;

class PagesController extends Controller
{
    public function index()
    {
        //$articles = Article::all();
        //$articles = Article::where('id', '>', 1)->get();
        //$articles = Article::where('id', 1)->get();
        $articles = Article::latest('id')->limit(3)->get();
        return view('pages.home', compact('articles'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function sendMessage()
    {
        $data = request()->all();

        Mail::to(config('mail.webmaster_email'))
            ->send(new ContactMe($data));

        return redirect()->route('home')->with(['alert' => 'تم الإرسال بنجاح، إنتظر الرد قريباً']);
    }
}
