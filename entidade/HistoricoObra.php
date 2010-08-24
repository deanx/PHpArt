<?php

/**
 * Description of HistoricoObra
 *
 * @author vanessas
 */
class HistoricoObra {

    /**
     *
     * @var <int>
     */
    private $id;

    /**
     * Id da obra ao qual o registro do historico se refere
     *
     * @var <int>
     */
    private $idObra;

    /**
     * Id do administrador que criou o registro
     *
     * @var <int>
     */
    private $idAdministrador;

    /**
     * Texto de observacao do registro
     *
     * @var <string>
     */
    private $texto;

    /**
     * Data de criação do registro
     *
     * @var <date>
     */
    private $dataCadastro;

    /**
     *
     * @var <enum>
     */
    private $clima;
    // TODO: fazer mecanismo de enum simples
    // TODO: tem soh um clima por registro? no papel eram 3, o da manha, o da tarde e o da noite

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIdObra() {
        return $this->idObra;
    }

    public function setIdObra($idObra) {
        $this->idObra = $idObra;
    }

    public function getIdAdministrador() {
        return $this->idAdministrador;
    }

    public function setIdAdministrador($idAdministrador) {
        $this->idAdministrador = $idAdministrador;
    }

    public function getTexto() {
        return $this->texto;
    }

    public function setTexto($texto) {
        $this->texto = $texto;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    public function getClima() {
        return $this->clima;
    }

    public function setClima($clima) {
        $this->clima = $clima;
    }
}
?>
