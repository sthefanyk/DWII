<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AlunoList extends Component
{
    public $header;
    public $hide;
    public $dados;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($header, $dados, $hide)
    {
        $this->header = $header;
        $this->hide = $hide;
        $this->dados = $dados;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.aluno-list');
    }
}
