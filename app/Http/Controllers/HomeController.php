<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Services\PostService;
use Illuminate\View\View;
use App\Services\PageService;


class HomeController extends Controller
{

    public function __construct(
        private PostService $postService,
        private PageService $pageService,
        private Request $request,
    ) {}

    public function index(string $page = ''): View
    {
        $currentPage = $this->pageService->getCurrentPage($page);
        $latestPosts = $this->postService->fetchAll(5, $currentPage);
        $postsWithPreview = $this->postService->addPreviewToPosts($latestPosts->getCollection(),250);
        $latestPosts->setCollection($postsWithPreview);

        return view('home', ['posts' => $latestPosts]);
    }

    public function category(string $category, int $page = 1): View
    {
        $latestPosts = $this->postService->fetchByCategory(5,$category, $page);
        dd($latestPosts);
        return view('home', ['posts' => $latestPosts]);
    }
}
