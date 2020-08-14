<?php

namespace App\Http\Controllers;

use App\Help;
use App\Http\Requests\HelpRequest;
use App\Mail\HelpMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HelpController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except(['create', 'store']);
    }

    public function index(){

    }

    public function create(){
        return view('help.create');
    }


    public function store(HelpRequest $request){
        $input = $request->validated();
        $message = ['success' => 'Email sent successfully'];
        $email = Mail::to('intoajohnson@gmail.com');
        if(isset($request->copy)){
            $email->bcc($input['email']);
        }
        $email->send( new HelpMail($input));

        if(!isset($input['attachment'])){
            $result = Help::create($request->validated());
            if (!$result){
                $message = ['error' => 'Email sending failed'];
            }
            return response()->json($message);
        }

        $attachmentName = time(). '.' .$input['attachment']->extension();
        $input['attachment']->move(public_path('store'), $attachmentName);
        $input['attachment'] = $attachmentName;
        $result = Help::create($input);
        if (!$result){
            $message = ['error' => 'Email sending failed'];
        }
        return response()->json($message);
    }

}
