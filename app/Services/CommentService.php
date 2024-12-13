<?php

namespace App\Services;

use App\Models\Comment;

class CommentService
{
    public function create(array $data): Comment
    {
        $comment = new Comment();
        $comment->text = $data['text'];
        $comment->user_id = $data['user_id'];
        $comment->post_id = $data['post_id'];
        $comment->save();
        return $comment;
    }
}
