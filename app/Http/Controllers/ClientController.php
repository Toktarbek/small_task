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
        $requisition_read = $this->get_data(0);
        $requisition_unread = $this->get_data(2);
        
        return view('client/index',compact('requisition_read','requisition_unread'));
    }

    public function requisition(Request $request)
    {
        $requisition = Requisition::whereDate('created_at', '=', date('Y-m-d'))
                       ->where('user_id','=',Auth::user()->id)
                       ->get();
        $check = (count($requisition)>0)?false:true;
        return view('client/requisition',compact('check'));
    }

    public function send(Request $request)
    {
        $subject = $request->subject;
        $message = $request->message;
        $requisition = new Requisition();
        $requisition->subject = $request->subject;
        $requisition->message = $request->message;
        $requisition->user_id  = Auth::user()->id;
        if ($request->hasfile('files')) {
    		$file = $request->file('files');
    		$extension = $file->getClientOriginalExtension();
    		$filename = time() . '.' . $extension;
    		$file->move('documents', $filename);
    		$requisition->file_name = 'documents/'.$filename;
    	}else{
    		// return $request;
    		$orders->file_name = '';
    	}
        $requisition->save();

        return redirect('/')->with('success', 'Успешно!');
    }
}
