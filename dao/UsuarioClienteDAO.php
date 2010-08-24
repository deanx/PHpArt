<?php

require_once(ROOT."/dao/BaseDAO.php");


/**
 * Description of UsuarioClienteDAO
 *
 * @author Vanessa
 */
class UsuarioClienteDAO extends BaseDAO {

    /**
     *
     * @param <string> $usuario
     * @param <string> $senha
     * @return <UsuarioCliente>
     */
    public function getUsuarioClienteByLogin($usuario, $senha) {
        // TODO: "SELECT * FROM usuario_cliente WHERE usuario = '".$usuario."' AND senha = '".$senha."'"
    }

    /**
     *
     * @param <UsuarioCliente> $usuarioCliente
     * @return <int> id do usuario cliente
     */
    public function addUsuarioCliente($usuarioCliente) {
        // TODO: "INSERT INTO usuario_cliente (...) VALUES ()"
    }

    /**
     *
     * @param <UsuarioCliente> $usuarioCliente
     */
    public function updateUsuarioCliente($usuarioCliente) {
        // TODO: "UPDATE usuario_cliente SET ... = ..."
    }

    /**
     *
     * @param <int> $id
     */
    public function removeUsuarioCliente($id) {
        // TODO: "DELETE FROM usuario_cliente WHERE id = " . $id
    }
}
?>
