<?php

require_once(ROOT."/dao/ObraDAO.php");


/**
 * Description of ObraBO
 *
 * @author Vanessa
 */
class ObraBO {

    private $obraDao;

    function __construct() {
        $this->obraDao = new ObraDAO();
    }

    /**
     *
     * @param <int> $id
     * @return <Obra>
     */
    public function getObraById($id) {
        return $this->obraDao->getObraById($id);
    }
}
?>

