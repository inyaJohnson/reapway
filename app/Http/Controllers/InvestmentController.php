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
            $investments = auth()->user()->investment();
        }
        return view('investment.index', compact('investments'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
//        return view('investment.create');
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
            'duration' => $package->duration
        ]);
        return redirect()->route('investment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function invest()
    {
        $packages = Package::all();
        return view('investment.invest', compact('packages'));
    }




}
