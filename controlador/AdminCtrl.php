<?php

/* * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once(ROOT . "/controlador/BaseCtrl.php");
require_once(ROOT . "/dao/AdministradorDAO.php");

class AdminCtrl extends BaseCtrl {

    function __construct() {
        $this->dao = new AdministradorDAO();
    }

    public function login() {
        $admin = $this->dao->getAdministradorByLogin($_POST["usuario"], $_POST["senha"]);
		
		if($admin) $_SESSION["logado"] = 1;
        if (!$admin && isset ($_POST["usuario"])) {
            $this->setMsgRetorno("erroLogin", utf8_encode("Usuário ou senha inválidos"));
        } else {
            if (isset($_POST["usuario"]) && $admin->getCliente() == 0) {
                $this->goPagOp("admin", "opcoesAdminTotal");
                $this->setMsgRetorno("erroLogin","");
            }

            if (isset($_POST["usuario"]) && $admin->getNivel() == 1) {
                $this->goPagOp("admin", "opcoesClienteObra");
                $this->setMsgRetorno("erroLogin","");
            }
        }
    }

    public function preLive()   {
        session_start();
        if($_GET["op"] != "login")  {
            if($_SESSION["logado"] != 1)    {
			
                
                session_destroy();
                $this->goPagOp("admin", "login");
            }
        }
		else 	{
			$_SESSION["logado"] = "";
			$_SESSION["admin"] = "";
		}
    }

}
?>
