<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DocenciaList extends Component
{
    public $header;
    public $docencia;
    public $hide;
    public $disciplinas;
    public $professores;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($header, $docencia, $hide, $disciplinas, $professores)
    {
        $this->header = $header;
        $this->docencia = $docencia;
        $this->hide = $hide;
        $this->disciplinas = $disciplinas;
        $this->professores = $professores;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.docencia-list');
    }
}
