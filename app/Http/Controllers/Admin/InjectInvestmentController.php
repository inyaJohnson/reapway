<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Investment;
use App\Package;
use App\Withdrawal;
use Illuminate\Http\Request;

class InjectInvestmentController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        $packages = Package::all();
        return view('inject-investment.create', compact('packages'));
    }

    public function store(Request $request)
    {
        $input = $this->validate($request, [
            'percentage' => 'required|integer',
            'package' => 'required|not_in:Choose Package *',
            'user_id' => 'required'
        ]);

        $package = Package::find($input['package']);

        $investment = Investment::create([
            'user_id' => $input['user_id'],
            'package_id' => $package->id,
            'percentage' => $input['percentage'],
            'duration' => 0,
            'profit' => ($package->price * $input['percentage']) / 100,
            'maturity' => 1,
            'withdrawn' => 0,
            'reinvest' => 2,
            'commitment' => 1
        ]);

        $withdrawal = new Withdrawal();
        $withdrawal->user_id = $input['user_id'];
        $withdrawal->investment_id = $investment->id;
        $withdrawal->amount = ($package->price * $input['percentage']) / 100;
        $withdrawal->status = 0;
        $withdrawal->match = 0;
        $withdrawal->created_at = '2020-01-16 05:27:02';
        $withdrawal->updated_at = '2020-01-16 05:27:02';
        $withdrawal->save(['timestamps' => false]);

        return redirect()->back()->with('success', 'Investment placed successfully');
    }

    public function edit()
    {

    }

    public function destroy()
    {

    }
}
