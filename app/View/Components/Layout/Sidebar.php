<?php

namespace App\View\Components\Layout;

use App\Services\MarkdownNavigation;
use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public MarkdownNavigation $navigation
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Closure|\Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.layout.sidebar');
    }
}
