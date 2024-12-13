<?php

namespace App\Http\Controllers;

use App\Services\SubscribeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscribeController extends Controller
{
    public function __construct(
        private SubscribeService $subscribeService,
    )
    {
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'follower_id' => 'required|int|exists:users,id',
        ]);
        if ($validator->fails()) {
            throw new \Illuminate\Validation\ValidationException($validator);
        }
        $data = $validator->validated();
        $data['user_id'] = $request->user()->id;
        $this->subscribeService->create($data);
        return redirect()->back()->with('success', 'Subscribe added successfully');
    }
}
