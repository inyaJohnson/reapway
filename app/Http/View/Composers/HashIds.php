<?php


namespace App\Http\View\Composers;


use Illuminate\View\View;

class HashIds
{
    public function compose(View $view)
    {
        $hashIds = new \Hashids\Hashids('Rocking_hard_067', 10);
        return $view->with('hashIds', $hashIds);
    }
}
