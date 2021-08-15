<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requisition;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $requisition = Requisition::orderBy('id','desc')->get();
        foreach($requisition as $r){
            $r->user;
        }
        return view('admin/index',compact('requisition'));
    }

    public function answer($id){
        $requisition = Requisition::find($id)->first();
        return view('admin/answer',compact('requisition'));
    }

    public function send(Request $request,$id){
        $answer = new Answer();
        $answer->answer = $request->answer;
        $answer->requisition_id = $id;
        $answer->save();

        $requisition = Requisition::find($id);
        $requisition->status = 1;
        $requisition->save();
        return redirect('/admin')->with('status','Успешно!');
    }
}
