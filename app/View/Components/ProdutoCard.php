<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Produto;

class ProdutoCard extends Component
{
     public Produto $produto; 

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Produto $produto) {
        $this->produto = $produto;
    }
 
    /**
     * @return Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.produto-card');
    }
}
