<?php

/**
 * Description of UsuarioCliente
 *
 * @author vanessas
 */
class UsuarioCliente {

    // TODO: na modelagem do jeito que ta cada usuario cliente, ou seja, cada cliente pode ver todas as obras do cliente. Sera que nao tem usuario que so pode ver uma obra?

    /**
     *
     * @var <int>
     */
    private $id;

    /**
     *
     * @var <int>
     */
    private $idCliente;

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

    /**
     * Array de id de obras permitidas ao usuario do cliente
     *
     * @var <int[]>
     */
    private $listaIdObras;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIdCliente() {
        return $this->idCliente;
    }

    public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
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

    public function getListaIdObras() {
        return $this->listaIdObras;
    }

    public function setListaIdObras($listaIdObras) {
        $this->listaIdObras = $listaIdObras;
    }
}
?>
