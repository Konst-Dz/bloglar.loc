<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function __construct(
        private CommentService $commentService,
    )
    {
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'text' => 'required|string',
            'post_id' => 'required|int|exists:posts,id',
        ]);
        if ($validator->fails()) {
            throw new \Illuminate\Validation\ValidationException($validator);
        }
        $data['user_id'] = $request->user()->id;
        $data['text'] = $request->input('text');
        $data['post_id'] = $request->input('post_id');
        $this->commentService->create($data);
        return redirect()->back()->with('success', 'Comment added successfully');
    }
}
