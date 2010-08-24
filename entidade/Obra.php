<?php

/**
 * Description of Obra
 *
 * @author vanessas
 */
class Obra {

    /**
     *
     * @var <int>
     */
    private $id;

    /**
     *
     * @var <string>
     */
    private $nomeObra;

    /**
     *
     * @var <string>
     */
    private $descricaoObra;
    
    /**
     * Id do cliente ao qual a obra foi alocada
     *
     * @var <int>
     */
    private $idCliente; // TODO: ou em vez de <Integer> $idCliente ser <Cliente> $cliente

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNomeObra() {
        return $this->nomeObra;
    }

    public function setNomeObra($nomeObra) {
        $this->nomeObra = $nomeObra;
    }

    public function getDescricaoObra() {
        return $this->descricaoObra;
    }

    public function setDescricaoObra($descricaoObra) {
        $this->descricaoObra = $descricaoObra;
    }

    public function getIdCliente() {
        return $this->idCliente;
    }

    public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }
}
?>
