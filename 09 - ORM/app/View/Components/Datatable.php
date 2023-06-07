<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Datatable extends Component {
    
    public $title;
    public $crud;
    public $header;
    public $data;
    public $eixos;
    public $cursos;
    public $docencia;
    public $acao;

    public function __construct($title, $crud, $header, $data, $eixos, $cursos, $docencia, $acao) {
        $this->title = $title;   
        $this->crud = $crud;
        $this->header = $header;
        $this->data = $data;
        $this->eixos = $eixos;
        $this->cursos = $cursos;
        $this->docencia = $docencia;
        $this->acao = $acao;
    }

    public function render() {
        return view('components.datatable');
    }
}
