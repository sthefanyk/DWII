<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Datatable extends Component {
    
    public $title;
    public $crud;
    public $header;
    public $data;
    public $acao;

    public function __construct($title, $crud, $header, $data, $acao) {
        $this->title = $title;   
        $this->crud = $crud;
        $this->header = $header;
        $this->data = $data;
        $this->acao = $acao;
    }

    public function render() {
        return view('components.datatable');
    }
}
