<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requisition;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function get_data($status)
    {
        $requisition = Requisition::where('user_id','=',Auth::user()->id)
                       ->where('status','=',$status)
                       ->orderBy('id','desc')->get();
        foreach($requisition as $r){
            $r->user;
            $r->answers;
        }
        return $requisition;
    }

    public function index(Request $request)
    {
        $check_requisition = Requisition::whereDate('created_at', '=', date('Y-m-d'))
                       ->where('user_id','=',Auth::user()->id)
                       ->get();
        
        
        $requisition_read = $this->get_data(1);
        $requisition_unread = $this->get_data(0);
        $check = (count($check_requisition)>0)?false:true;
        
        return view('client/index',compact('check','requisition_read','requisition_unread'));
    }

    public function send(Request $request)
    {
        $subject = $request->subject;
        $message = $request->message;
    }
}
