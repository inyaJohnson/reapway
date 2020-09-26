<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Investment;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function investment(Request $request)
    {
        $start = $request->start;
        $end = $request->end;
        switch ($request) {
            case (isset($request->start) && !isset($request->end) || $request->start === $request->end) :
                $searchResult = Investment::whereDate('created_at', $request->start)->get();
                break;
            case (!isset($request->start) && isset($request->end)) :
                $searchResult = Investment::whereDate('created_at', $request->end)->get();
                break;
            default :
                $searchResult = Investment::whereBetween('created_at', [$request->start, $request->end])->get();
        }
        return view('search.investment', compact('searchResult', 'start', 'end'));
    }
}
