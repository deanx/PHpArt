<?php

require_once(ROOT."/dao/BaseDAO.php");
require_once(ROOT."/dao/query/ObraQueries.php");
require_once(ROOT."/entidade/Obra.php");


/**
 * Description of ObraDAO
 *
 * @author Vanessa
 */
class ObraDAO extends BaseDAO {

    private $conn;
    private $obraQueries;

    function __construct() {
        $this->conn = parent::getConn();
        $this->obraQueries = new ObraQueries();
    }

    function preencheObra($row) {
        $obra = new Obra();
        $obra->setId($row->id);
        $obra->setNomeObra($row->nome_obra);
        $obra->setDescricaoObra($row->descricao_obra);
        $obra->setIdCliente($row->id_cliente);
        return $obra;
    }

    /**
     *
     * @return <Obra[]>
     */
    public function getObras() {
        // TODO: "SELECT * FROM obra"
    }

    /**
     *
     * @param <int> $id
     * @return <Obra>
     */
    public function getObraById($id) {

        $preparedQuery = $this->obraQueries->getQuery("getObraById");

        $parametersArray["id"] = $id;

        $preparedStatement = $this->conn->prepareAndExecuteStatement($preparedQuery, $parametersArray);

        while ($row = $this->conn->fetchObject($preparedStatement)) {
            $obra = $this->preencheObra($row);

            return $obra;
        }
    }

    /**
     *
     * @param <int> $clientId
     * @return <Obra[]>
     */
    public function getObrasByCliente($idCliente) {
        // TODO: "SELECT * FROM obra WHERE id_cliente = " . $idCliente
    }

    /**
     *
     * @param <Obra> $obra
     * @return <int> id da obra
     */
    public function addObra($obra) {
        // TODO: "INSERT INTO obra ... VALUES (...)"
    }

    /**
     *
     * @param <Obra> $obra
     */
    public function updateObra($obra) {
        // TODO: "UPDATE obra SET ... = ..."
    }

    /**
     *
     * @param <int> $id
     */
    public function removeObra($id) {
        // TODO: "DELETE FROM obra WHERE id = ".$id
        // TODO: tratar caso em que tenha historicos para aquela obra: implementar restricao de integridade no bd
    }
}
?>

