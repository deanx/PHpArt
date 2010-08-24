<?php

/**
 * Description of BaseCtrl
 *
 * @author Vanessa
 */
require_once(ROOT . "/util/Navigation.php");

class BaseCtrl {

    private $parameters;
    protected $retornoMsgs = array();
    private $op;
    private $pag;

    protected function goPagOp($pag, $op="")    {
        $navigation = new Navigation();
        $navigation->goURL("index.php?pag=$pag&op=$op");
    }

    protected function setMsgRetorno($label, $value) {
        $_SESSION[$label] = $value;
    }
    
    protected function addParameter($label, $value) {
        $this->parameters[$label] = $value;
    }

    protected function getParameter($label) {
        $value = $this->parameters[$label];

        if (!$value) {
            Logger::logWarn("Tentando recuperar parametro inexistente de controlador. [Parametro = " . $label . "]");
        }

        return $value;
    }

    private function getCtrlName($pag) {
        return ucfirst($pag);
    }

    private function getCtrlFile($pag) {
        $ctrlName = $this->getCtrlName($pag);
        if($ctrlName == "") $ctrlName = "Index";

        if (file_exists(ROOT . "/controlador/" . $ctrlName . "Ctrl.php")) {
            require_once(ROOT . "/controlador/" . $ctrlName . "Ctrl.php");
            $this->addParameter("controlerExists", true);
        }
    }

    private function getCtrlInstance($pag) {
        
        if ($this->getParameter("controlerExists")) {
			if($pag == "") $pag = "Index";
			$nomeObjeto = $this->getCtrlName($pag) . "Ctrl";
			
            $obj = new $nomeObjeto();
            return $obj;
        } else {
            return false;
        }
    }

    private function getViewFile($pag="index", $op="index") {
        if (!$pag || ! $op) {
            $pag = "index";
            $op = "index";
        }


        $ctrlName = $this->getCtrlName($pag);

	
        if (file_exists(ROOT . "/paginas/" . $ctrlName . "/" . $op . ".php")) {
     
            require_once(ROOT . "/paginas/" . $ctrlName . "/" . $op . ".php");
        }
    }

    private function birth() {
        if (isset($_GET["op"]))
            $this->addParameter("op", $_GET["op"]);
        if (isset($_GET["pag"]))
            $this->addParameter("pag", $_GET["pag"]);
    }

    private function callCrlMethodIfExists($metodo) {
        
        if ($this->getCtrlInstance($this->getParameter("pag"))) {
            $obj = $this->getCtrlInstance($this->getParameter("pag"));
            
            if (method_exists($obj, $metodo)) {
                $obj->$metodo();
            }
        }

        
    }

    public function live() {
        $this->birth();

        

        $this->getCtrlFile($this->getParameter("pag"));
		
        $this->callCrlMethodIfExists("preLive");
        
        $obj = $this->getCtrlInstance($this->getParameter("pag"));
		$parametro = $this->getParameter("op");
		if($parametro == "") $parametro = "index";
		
        if (method_exists($obj, $parametro)) {
            $metodo = $parametro;
            $obj->$metodo();
        }

        $this->getViewFile($this->getParameter("pag"), $this->getParameter("op"));

        $this->callCrlMethodIfExists("posLive");
    }

}
?>