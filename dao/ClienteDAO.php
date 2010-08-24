<?php

require_once(ROOT."/dao/BaseDAO.php");


/**
 * Description of clienteDAO
 *
 * @author Vanessa
 */
class ClienteDAO extends BaseDAO {

    /**
     *
     * @return <Cliente[]>
     */
    public function getClientes() {
        // TODO: "SELECT * FROM cliente"
    }

    /**
     *
     * @param <int> $id
     * @return <Cliente>
     */
    public function getClienteById($id) {
        // TODO: "SELECT * FROM cliente WHERE id = " . $id
    }

    /**
     *
     * @param <Cliente> $cliente
     * @return <int> id do cliente
     */
    public function addCliente($cliente) {
        // TODO: "INSERT INTO cliente (...) VALUES (...)"
    }

    /**
     *
     * @param <Cliente> $cliente
     */
    public function updateCliente($cliente) {
        // TODO: "UPDATE cliente SET ... = ..."
    }
}
?>
