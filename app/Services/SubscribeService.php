<?php

namespace App\Services;

use App\Models\Subscribe;

class SubscribeService
{
    public function create(array $data): Subscribe
    {
        $subscribe = new Subscribe();
        $subscribe->user_id = $data['user_id'];
        $subscribe->follower_id = $data['follower_id'];
        $subscribe->save();
        return $subscribe;
    }
}
