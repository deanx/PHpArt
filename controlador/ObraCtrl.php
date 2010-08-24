<?php

require_once(ROOT."/controlador/BaseCtrl.php");
require_once(ROOT."/negocio/ObraBO.php");

/**
 * Description of ObraCtrl
 *
 * @author Vanessa
 */
class ObraCtrl extends BaseCtrl {

    /**
     *
     * @var <ObraBO>
     */
    private $obraBo;
    
    /**
     *
     * @var <Obra>
     */
    private $obra;

    function __construct() {
        $this->obraBo = new ObraBO();

        $id = $_GET['id'];
        $this->obra = $this->obraBo->getObraById($id);
    }

    /**
     *
     * @return <Obra>
     */
    public function getObra() {
        return $this->obra;
    }
}
?>

