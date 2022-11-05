<?php

if($_SERVER["REQUEST_METHOD"]==="GET"){
    if(isset($_GET["peso"])&&isset($_GET["altura"])){
        echo "<h1>Seu Peso = ".$_GET["peso"]."</h1>";
        echo "<h1>Sua Altura = ".$_GET["altura"]."</h1>";
        $peso = $_GET["peso"];
        $altura = $_GET["altura"];
        $altura = $altura/100;
        $imc = ($peso/($altura*$altura));
        echo "<h1>IMC = ".$imc."<h1>";

        if($imc < 18.5)
            echo "<h1> Classificação - Magreza</h1>";

        else if($imc >= 18.5 && $imc < 25)
            echo "<h1> Classificação - Normal</h1>"; 

        else if($imc >= 25 && $imc < 30)
            echo "<h1> Classificação - Sobrepeso</h1>";

        else if($imc >= 30 && $imc < 35)
            echo "<h1> Classificação - Obesidade I</h1>";

        else if($imc >= 35 && $imc < 40)
            echo "<h1> Classificação - Obesidade II</h1>";

        else if($imc >= 40)
            echo "<h1> Classificação - Obesidade III</h1>";
    
        exit();
    }
}

http_response_code(400);