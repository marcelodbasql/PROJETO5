<?php

namespace App;

class Demanda {
    public $unidade;
    public $orgao;
    public $apontamento;
    public $gestor;
    public $responsavel;
    public $status;
    public $recebimento;
    public $prazo;

    public function __toString() {
        return json_encode($this);
    }

}