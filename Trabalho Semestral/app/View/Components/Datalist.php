<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Datalist extends Component
{
    public $title;
    public $crud;
    public $header;
    public $dados;
    public $acao;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $crud, $header, $dados, $acao)
    {
        $this->title = $title;
        $this->crud = $crud;
        $this->header = $header;
        $this->dados = $dados;
        $this->acao = $acao;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.datalist');
    }
}
