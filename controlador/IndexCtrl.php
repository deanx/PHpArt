<?php
require_once(ROOT . "/controlador/BaseCtrl.php");
require_once(ROOT . "/dao/AdministradorDAO.php");

class IndexCtrl extends BaseCtrl {
	function index()	{
		header("location:index.php?pag=admin&op=login");
	}
}
?>