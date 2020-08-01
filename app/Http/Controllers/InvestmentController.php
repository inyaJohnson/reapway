<?php

namespace App\Http\Controllers;

use App\Investment;
use App\Package;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;

class InvestmentController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $investments = Investment::all();
        if(!auth()->user()->hasRole('Admin')){
            $investments = auth()->user()->investment;
        }
        return view('investment.index', compact('investments'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $package = Package::where('id', $request->package_id)->firstOrFail();
        auth()->user()->investment()->create([
            'package_id' => $package->id,
            'percentage' => $package->percentage,
            'duration' => $package->duration,
            'profit' => round($package->price * ($package->percentage/100))
        ]);
        return redirect()->route('investment.index');
    }

    public function invest()
    {
        $packages = Package::all();
        return view('investment.invest', compact('packages'));
    }

    public function reinvest($id)
    {
        $investment = Investment::findorFail($id);
        auth()->user()->investment()->create([
            'package_id' => $investment->package_id,
            'percentage' => $investment->percentage,
            'duration' => $investment->duration,
            'profit' => round($investment->package->price * ($investment->percentage/100))
        ]);
        $investment->update(['reinvest' => 1]);
        return redirect()->route('investment.index');
    }

    public function withdraw($id)
    {
        $investment = Investment::findorFail($id);
//        auth()->user()->investment()->create([
//            'package_id' => $investment->package_id,
//            'percentage' => $investment->percentage,
//            'duration' => $investment->duration,
//            'profit' => round($investment->package->price * ($investment->percentage/100))
//        ]);
        $investment->update(['reinvest' => 2]);
        return redirect()->route('investment.index');
    }

}
