<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requisition;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $requisition = Requisition::whereDate('created_at', '=', date('Y-m-d'))
                       ->where('user_id','=',Auth::user()->id)
                       ->get();
        $check = (count($requisition)>0)?false:true;
        
        return view('client/index',compact('check'));
    }
}
