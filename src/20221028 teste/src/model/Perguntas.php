<?php
namespace App\model;

require_once "ConexaoPerguntas.php";

class Perguntas
{
    private $id;
    private $perguntas;
    private $status;
    private $usuario_id;
    
    
    private $conexao;

    function __construct(
        $id = null,
        $perguntas = null,
        $status = null,
        $usuario_id = null
        
       
    ) {
        $this->id = null;
        $this->setPergunta($perguntas);
        $this->setStatus($status);
       
        $this->conexao = Conexao::getInstancia();
    }

    public function getId()
    {
        return $this->id;
    }
    public function setPergunta($perguntas)
    {
        $this->pergunta = $perguntas;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }
    public function getStatus()
    {
        return $this->status;
    }

    public function usuario_id($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }
    
    public function criar()
    {
        if ($this->id != null)
            return false;

        $query = "INSERT INTO perguntas (id,pergunta,status,usuario_id,created,modified) VALUES ('" . $this->pergunta . "','" . $this->status . "','" . $this->usuario_id . date(DATE_ATOM) . "','" . date(DATE_ATOM) . "')";

        $result = pg_query($query);

        if ($result)
            $this->id = pg_last_oid($result);

        return $result;
    }

    public function ler($id = null)
    {
        if ($id == null) {
            $sql = "SELECT * FROM perguntas";
        } else {
            $sql = "SELECT * FROM perguntas WHERE id='$id'";
        }
        $returnValue = array();

        $result = pg_query($sql);

        while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            array_push($returnValue, $line);
        }

        return $returnValue;
    }

    public function getPergunta($id)
    {
        $result = $this->ler($id);
        if (empty($result))
            return 0;

        $result = $result[0];

        $this->id = $id;
        $this->setPergunta($result["pergunta"]);
        $this->setStatus($result["status"]);
        $this->setUsuario_id($result["usuario_id"]);
        
        
        

        return $this;
    }

    public function atualizar()
    {
        error_reporting(E_ERROR | E_PARSE);

        if ($this->id == null)
            return false;

        $query = "UPDATE perguntas SET pergunta= '" . $this->pergunta . "', status= '" . $this->status . "', usuario_id= '" . $this->usuario_id . "', modified= '" . date(DATE_ATOM) . "' WHERE id= '" . $this->id . "'";

        $result = pg_query($query);

        return $result;
    }

    public function deletar()
    {
        if ($this->id == null)
            return false;

        $query = "DELETE FROM pergunta WHERE id='" . $this->id . "'";

        $result = pg_query($query);
        
        if($result)
            $this->id = null;

        return $result;
    }
}


//Instanciar um novo usuario com dados
//$usuario = new Usuario("Felipe", "46763", "fpp", "12345", "remove_red_eye", "supervisor_account", true);
//Inserir no banco de dados
//$usuario->criar();

//Instanciar um novo usuario sem dados
//$usuario = new Usuario();
//Pegar as informações do usuario pelo seu ID
//$usuario->getUsuario(2);

//Setar informações do usuario
//$usuario->setNome("Felipe");
//Atualizar informações no banco de dados
//$usuario->atualizar();

//Deletar o usuario
//$usuario->deletar();