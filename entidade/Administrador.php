<?php

/**
 * Description of Administrador
 *
 * @author vanessas
 */
class Administrador {

    /**
     *
     * @var <int>
     */
    private $id;

    /**
     * 
     * @var <string> 
     */
    private $nome;

    /**
     *
     * Nivel de privilegios do administrador
     *
     * @var <int>
     */
    private $nivel;

    /**
     *
     * @var <string>
     */
    private $usuario;

    /**
     *
     * @var <string>
     */
    private $senha;
	
	private $cliente;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNivel() {
        return $this->nivel;
    }

    public function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }
	
	public function getCliente()	{
		return $this->cliente;
	}
	
	public function setCliente($cliente)	{
		$this->cliente = $cliente;
	}
}
?>
