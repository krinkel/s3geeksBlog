<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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
    
    public function index()
    {
        return view('backend.index');
    }
}
