<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{

    public function create()
    {
        return view('admin.investment.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $input = $this->validate($request, [
            'name' => ['required', 'min:3', 'string'],
            'description' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'percentage' => ['required', 'integer'],
            'duration' => ['required', 'integer']
        ]);
        Package::create($input);
        return redirect()->route('investment.invest')->with('success', 'Package Created Successfully');
    }
}
