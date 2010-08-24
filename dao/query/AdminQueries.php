<?php

require_once(ROOT."/dao/query/BaseQueries.php");

/**
 * Description of ObraQueries
 *
 * @author Vanessa
 */
class AdminQueries extends BaseQueries {

    function __construct() {
        parent::addQuery("getAdminByLogin", "SELECT * FROM administrador WHERE usuario = :usuario and senha=:senha");
    }


}
?>