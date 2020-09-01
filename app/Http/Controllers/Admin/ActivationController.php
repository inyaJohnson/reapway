<?php

namespace App\Http\Controllers\Admin;

use App\Activation;
use App\Activator;
use App\Http\Controllers\Controller;
use App\User;
use Hashids\Hashids;
use Illuminate\Http\Request;

class ActivationController extends Controller
{
    public function index()
    {
        $activations = Activation::all();
        return view('activation.index', compact('activations'));
    }


    public function deny()
    {
        if (auth()->user()->activation == 1) {
            return redirect()->route('home');
        }
        $activatorId = auth()->user()->activator->id;
        return view('activation.deny', compact('activatorId'));
    }

    public function showActivator(Request $request)
    {
        $hashIds = new Hashids('Rocking_hard_067', 10);
        $activator = Activator::find($request->activatorId);
        $message = ['error' => 'Activator does not exits'];
        if ($activator !== null) {
            $message = [
                'activatorId' => $hashIds->encode($activator->id),
                'name' => $activator->account_name,
                'number' => $activator->account_number,
                'bank' => $activator->bank,
                'phone' => $activator->phone
            ];
        }
        return response()->json($message);
    }

    public function upload($id)
    {
        if (auth()->user()->activation == 1) {
            return redirect()->route('home');
        }

        $user = Activation::where([
            ['user_id', auth()->user()->id],
            ['deleted_at', null]
        ])->first();
        $hashIds = new Hashids('Rocking_hard_067', 10);
        $activator = Activator::find($hashIds->decode($id)[0]);
        return view('activation.upload', compact('activator', 'user'));
    }

    public function store(Request $request)
    {
        $input = $this->validate($request, [
            'attachment' => 'required|file|max:5000',
            'activator_id' => 'required',
            'user_id' => 'required'
        ]);
        $attachmentName = time() . '.' . $input['attachment']->extension();
        $input['attachment']->move(public_path('store'), $attachmentName);
        $input['attachment'] = $attachmentName;
        Activation::create($input);
        $message = ['success' => "Payment Uploaded Successfully, You will be activated soon"];
        return response()->json($message);
    }

    public function activate($id)
    {
        $activate = Activation::where('user_id', $id)->first();
        $message = ['error' => 'Unable to activate user'];
        if ($activate !== null) {
            $activate->user->update(['activation' => 1]);
            $activate->delete();
            $message = ['success' => 'User activation successful'];
        }
        return response()->json($message);
    }
}
