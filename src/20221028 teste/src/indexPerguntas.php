<?php

use App\Model\PerguntasController;

    require_once 'controller/PerguntasController.php';

    $user = new PerguntasController();
    $user->exibir();