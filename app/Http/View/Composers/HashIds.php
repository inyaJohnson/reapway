<?php


namespace App\Http\View\Composers;


use Illuminate\View\View;

class HashIds
{
    public function compose(View $view)
    {
        $hashIds = new \Hashids\Hashids('ReapWay', 10);
        return $view->with('hashIds', $hashIds);
    }
}
