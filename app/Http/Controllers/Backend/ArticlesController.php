<?php

namespace App\Http\Controllers\Backend;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            //=> Check permission To Access.
            if(Auth::user()->role != 'admin'){
                session()->flash('notificationType', 'error');
                session()->flash('message', trans('backend/messages.error.denied'));
                return redirect()->route('home');
            }

            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Article::latest('id')->where('status', 1)->paginate(30);

        return view('backend.modules.articles.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title'         => 'required|min:30|max:250',
            'author'        => 'required|min:2|max:250',
            'description'   => 'required|min:100|max:10000',
        ]);

        //$create = Article::create($data);
        $create = Article::create([
            'title'         => $request->title,
            'author'        => $request->author,
            'description'   => $request->description,
        ]);

        if($create)
            session()->flash('message', trans('backend/messages.success.created'));

        return redirect()->route('backend.articles');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Article::find($id);
        return view('backend.modules.articles.edit', compact('item'));
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
        $data = $this->validate($request, [
            'title'         => 'required|min:30|max:250',
            'author'        => 'required|min:2|max:250',
            'description'   => 'required|min:100|max:10000',
        ]);

        $update = Article::where('id', $id)->update([
            'title'         => $request->title,
            'author'        => $request->author,
            'description'   => $request->description,
        ]);

        if($update)
            session()->flash('message', trans('backend/messages.success.updated'));

        return redirect()->route('backend.articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Article::where('id', $id)->delete();
        $deleted = Article::where('id', $id)->update(['status' => 0]);

        if($deleted)
            session()->flash('message', trans('backend/messages.success.deleted'));

        return redirect()->route('backend.articles');
    }
}
