<?php
namespace App\Observers;

use App\Notifications\MatchReq;
use App\MatchRequest as match;
use App\Admin;

class MatchObserver
{
    public function created(match $item)
    {
        $author = $item->user;
        $users = Admin::all();
        foreach ($users as $user) {
            $user->notify(new MatchReq($item,$author));
        }
    }
}