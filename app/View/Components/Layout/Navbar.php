<?php

namespace App\View\Components\Layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Tag;

class Navbar extends Component
{
    public mixed $tags;
    /**
     * Create a new component instance.
     */
    public function __construct(Tag $tag)
    {
        $this->tags = $tag->getTags();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.navbar');
    }
}
