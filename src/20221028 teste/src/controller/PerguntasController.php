<?php

namespace App\Model;

require_once 'model/Perguntas.php';

class PerguntasController{
    public function exibir(){
        $perguntas = new perguntas();

        $_REQUEST['Perguntas'] =  $perguntas->ler();

        require_once 'view/perguntas_view.php';
    }
}