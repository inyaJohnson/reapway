<?php

namespace App\Http\Controllers;

use App\Report;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    public function index(){
        $reports = Report::all();
        return view('report.index', compact('reports'));
    }

    public function create($id){
        $defaulter = User::find($id);
        if($defaulter !== null){
            return view('report.create', compact('defaulter'));
        }
    }

    public function store(Request $request){
        $rule = array('message' => 'required|string', 'attachment' => 'max:2048', 'user_name' => 'required',
            'user_id' =>'required', 'defaulter_id' =>'required', 'defaulter_name' =>'required', 'defaulter_email' =>'required');
        $error = Validator::make($request->all(), $rule);
        if($error->fails()){
            return response()->json(['error'=> $error->errors()->all()]);
        }
        $message = ['success' => 'Report logged successfully'];
        $input = $request->all();
        if(isset($input['attachment'])){
            $attachmentName = time(). '.' .$input['attachment']->extension();
            $input['attachment']->move(public_path('store'), $attachmentName);
            $input['attachment']= $attachmentName;
        }
        $result = Report::create($input);
        if (!$result){
            $message = ['error' => 'Email sending failed'];
        }
        return response()->json($message);
    }


    public function block(Request $request){
        $user = User::find($request->defaulter_id);
        $report = Report::find($request->report_id);
        $report->update(['status' => 1]);
        $result = $user->update(['blocked' => 1]);
        $message = ['success' => $user->name. ' blocked'];
        if(!$result){
            $message = ['error' => 'Unable to block '. $user->name];
        }
        return response()->json($message);
    }

    public function show($id){
        $report= Report::find($id);
        return response()->json([
            'name'=>$report->user_name, 'message' => $report->message, 'subject'=> $report->subject,
            'attachment' => $report->attachment
        ]);
    }

}
