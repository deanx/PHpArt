<?php

require_once(ROOT . "/dao/BaseDAO.php");
require_once(ROOT . "/dao/query/AdminQueries.php");
require_once(ROOT . "/entidade/Administrador.php");

/**
 * Description of AdministradorDAO
 *
 * @author Vanessa
 */
class AdministradorDAO extends BaseDAO {

    private $conn;
    private $queries;

    function __construct() {
        $this->conn = parent::getConn();
        $this->queries = new AdminQueries();
    }

    public function getAdministradorByLogin($usuario, $senha) {
        $preparedQuery = $this->queries->getQuery("getAdminByLogin");

        $parametersArray["usuario"] = $usuario;
        $parametersArray["senha"] = md5($senha);

        $preparedStatement = $this->conn->prepareAndExecuteStatement($preparedQuery, $parametersArray);
        $admin = null;
        
        while ($row = $this->conn->fetchObject($preparedStatement)) {
            $admin = $this->preencheAdmin($row);
			
            return $admin;
        }
    }

    function preencheAdmin($row) {
        $admin = new Administrador();
        $admin->setId($row->id);
        $admin->setNome($row->nome_administrador);
        $admin->setNivel($row->nivel);
        $admin->setUsuario($row->usuario);
        $admin->setSenha($row->senha);
		$admin->setCliente($row->cliente);
        return $admin;
    }

    /**
     *
     * @param <int> $id
     * @return <Administrador>
     */
    public function getAdministradorById($id) {
        // TODO: "SELECT * FROM administrador WHERE id = " . $id
    }

    /**
     *
     * @param <int> $nivel
     * @return <Administrador[]>
     */
    public function getAdministradorByNivel($nivel) {
        // TODO: "SELECT * FROM administrador WHERE nivel = " . $nivel
    }

    /**
     *
     * @param <Administrador> $administrador
     * @return <int> id do administrador
     */
    public function addAdministrador($administrador) {
        // TODO: "INSERT INTO administrador (...) VALUES ()"
    }

    /**
     *
     * @param <Administrador> $administrador
     */
    public function updateAdministrador($administrador) {
        // TODO: "UPDATE administrador SET ... = ..."
    }

    /**
     *
     * @param <int> $id
     */
    public function removeAdministrador($id) {
        // TODO: "DELETE FROM administrador WHERE id = " . $id
    }

}
?>
