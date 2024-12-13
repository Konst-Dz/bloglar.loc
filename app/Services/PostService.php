<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostService
{
    public function fetchAll($limit,$currentPage) :object
    {
        return Post::with('user')->latest()->paginate($limit,['*'], 'page', $currentPage);
    }


    public function fetchLatest(int $limit = 10): Collection
    {
        return Post::latest()->take($limit)->get();
    }

    public function fetchById(int $id): ?Post
    {
        return Post::find($id);
    }

    public function fetchByCategory(int $limit,string $category,int $page) :Collection
    {
        //return Post::with('tags')->where('tag', $category)->paginate($limit,['*'], 'page', $page);
        return Post::with('tags')->get();
    }

    public function getPostBySlugWithUser(string $slug): Post
    {
        return Post::where('slug', $slug)->with('user')->with('tags')->with('comments.user')->firstOrFail();
    }

    public function create(array $data): Post
    {
        $post = new Post();
        $post->title = $data['title'];
        $post->text = $data['text'];
        $post->user_id = $data['user_id'];
        $post->slug = $data['slug'];
        $post->save();
        $post->tags()->attach($data['tags']);
        return $post;
    }

    public function update(Post $post, array $data): Post
    {
        $post->update($data);
        return $post;
    }

    public function delete(Post $post): void
    {
        $post->comments()->delete();
        $post->tags()->detach();
        $post->delete();
    }

    public function addPreviewToPosts( $posts,$lenth)
    {
        $posts = $posts->map(function ($post) use ($lenth) {
            $post->preview = substr($post->text, 0, $lenth) . '...';
            return $post;
        });
        return $posts;
    }
}
