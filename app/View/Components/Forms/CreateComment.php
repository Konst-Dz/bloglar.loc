<?php

namespace App\View\Components\Forms;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class CreateComment extends Component
{
    private Request $request;

    /**
     * Create a new component instance.
     */
    public function __construct(public Post $post,Request $request)
    {
        $this->request = $request;

    }

    public function shouldRender(): bool
    {
        return !is_null($this->request->user());
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.create-comment');
    }
}
