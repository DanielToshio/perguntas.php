<?php

namespace testepergunta;

use PHPUnit\Framework\TestCase;
use App\Model\Pergunta;
    

class UsuarioTest extends TestCase{
    public function testgetUsuario(){
        $pergunta = new Pergunta();
        $pergunta -> setUsuario (1);              
        $this->assertEquals($pergunta->getUsuario(),1);
    }
    


        
}



