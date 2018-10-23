<?php

namespace App\Http\Controllers\Backend;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends MasterController
{
    private $model;
    private $module = 'articles';

    public function __construct()
    {
        parent::__construct();
        $this->model = new Article;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->model->latest('id')->where('status', 1)->paginate(30);

        return view('backend.modules.'.$this->module.'.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.'.$this->module.'.create');
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

        //$create = $this->model->create($data);
        $create = $this->model->create([
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
        $item = $this->model->find($id);
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

        $update = $this->model->where('id', $id)->update([
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
        $deleted = $this->model->where('id', $id)->update(['status' => 0]);

        if($deleted)
            session()->flash('message', trans('backend/messages.success.deleted'));

        return redirect()->route('backend.articles');
    }
}
