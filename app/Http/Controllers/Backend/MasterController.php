<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MasterController extends Controller
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

}
