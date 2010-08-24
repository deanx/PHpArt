<?php

require_once(ROOT."/dao/query/BaseQueries.php");

/**
 * Description of ObraQueries
 *
 * @author Vanessa
 */
class ObraQueries extends BaseQueries {

    function __construct() {
        parent::addQuery("getObraById", "SELECT * FROM obra WHERE id = :id");
    }

    
}
?>
