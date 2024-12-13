<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Tag;
use App\Models\User;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function __construct(
        private PostService $postService,
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function fetchAll()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Tag $tag)
    {
        $tags = $tag->getTags();
        return view('posts.create', ['tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;
        return $this->postService->create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug, Request $request)
    {
        $post = $this->postService->getPostBySlugWithUser($slug);

        return view('posts.show', ['post' => $post, 'user' => $request->user()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post,Tag $tag)
    {
        $tags = $tag->getTags();
        return view('posts.edit', ['post' => $post,'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    public function togglePublic(Request $request)
    {
        $post = Post::find($request->post_id);
        if ($post) {
            $post->is_public = !$post->is_public ? 1 : 0;
            $post->save();
            return redirect()->back()->with('success', 'Статус поста изменен');
        } else {
            return redirect()->back()->with('error', 'Пост не найден');
        }
    }

    public function subscriptions(Request $request)
    {
        $userId = $request->user()->id;
        $posts = DB::table('posts')
            ->whereIn('user_id', function ($query) use ($userId) {
                $query->select('follower_id')
                    ->from('subscribes')
                    ->where('user_id', $userId);
            })
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->get();
        return view('home', ['posts' => $posts]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
         $this->postService->delete($post);
         return redirect()->route('home');
    }
}
