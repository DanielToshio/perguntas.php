<?php

namespace App\model;

require_once "../model/Perguntas.php";


$pergunta = new Pergunta();

$pergunta->setpergunta($_POST["Pergunta"]);
$pergunta->setstatus($_POST["statusPergunta"]);
$pergunta->setid($_POST["usuario_Id"]);



$pergunta->criar();
