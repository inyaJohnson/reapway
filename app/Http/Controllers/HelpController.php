<?php

namespace App\Http\Controllers;

use App\Help;
use App\Http\Requests\HelpRequest;
use App\Http\Requests\ResponseRequest;
use App\Mail\HelpMail;
use App\Mail\ResponseMail;
use App\Response;
use Illuminate\Support\Facades\Mail;

class HelpController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except(['create', 'store']);
    }

    public function index(){
        $requests = Help::all();
        return view('help.index', compact('requests'))
            ->with('i', (\request()->input('page', 1)-1)*10);
    }

    public function create(){
        return view('help.create');
    }


    public function store(HelpRequest $request){
        $input = $request->validated();
        $message = ['success' => 'Email sent successfully'];
        $email = Mail::to('info@rocketpay.cc');
        if(isset($request->copy)){
            $email->bcc($input['email']);
        }
        $email->send( new HelpMail($input));

        if(isset($input['attachment'])){
            $attachmentName = time(). '.' .$input['attachment']->extension();
            $input['attachment']->move(public_path('store'), $attachmentName);
            $input['attachment'] = $attachmentName;
        }
        $result = Help::create($input);
        if (!$result){
            $message = ['error' => 'Email sending failed'];
        }
        return response()->json($message);
    }

    public function show($id){
        $request = Help::find($id);
        return response()->json($request);
    }

    public function response($id){
        $help = Help::find($id);
        return view('help.response', compact('help'));
    }

    public function sendResponse(ResponseRequest $request){
        $input = $request->validated();
        $message = ['success' => 'Email sent successfully'];
        $email = Mail::to($input['email']);
        $email->send( new ResponseMail($input));

        if(!isset($input['attachment'])){
            $result = Response::create($request->validated());
            if (!$result){
                $message = ['error' => 'Email sending failed'];
            }
            return response()->json($message);
        }

        $attachmentName = time(). '.' .$input['attachment']->extension();
        $input['attachment']->move(public_path('store'), $attachmentName);
        $input['attachment'] = $attachmentName;
        $help = Help::find($input['help_id']);
        $help->update(['response_status' => 1]);
        $result = Response::create($input);
        if (!$result){
            $message = ['error' => 'Email sending failed'];
        }
        return response()->json($message);
    }

}
