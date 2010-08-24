<?php

require_once(ROOT."/dao/BaseDAO.php");


/**
 * Description of HistoricoObraDAO
 *
 * @author Vanessa
 */
class HistoricoObraDAO extends BaseDAO {

    /**
     *
     * @param <int> $id
     * @return <HistoricoObra>
     */
    public function getHistoricoObraById($id) {
        // TODO: "SELECT * FROM historico_obra WHERE id = " . $id
    }

    /**
     *
     * @param <int> $id
     * @return <HistoricoObra>
     */
    public function getHistoricosObraByObraId($idObra) {
        // TODO: "SELECT * FROM historico_obra WHERE id_obra = " . $idObra
    }

    /**
     *
     * @param <HistoricoObra> $historicoObra
     * @return <int> id do historico
     */
    public function addHistoricoObra($historicoObra) {
        // TODO: "INSERT INTO historico_obra ... VALUES (...)"
    }

    /**
     *
     * @param <HistoricoObra> $historicoObra
     */
    public function updateHistoricoObra($historicoObra) {
        // TODO: "UPDATE historico_obra SET ... = ..."
    }

    /**
     *
     * @param <int> $id
     */
    public function removeHistoricoObra($id) {
        // TODO: "DELETE FROM historico_obra WHERE id = ".$id
    }
}
?>
