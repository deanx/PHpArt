<?php

require_once(ROOT."/util/Logger.php");

/**
 * Description of BaseQueries
 *
 * @author Vanessa
 */
class BaseQueries {

    private $queries;

    protected function addQuery($label, $query) {
        $this->queries[$label] = $query;
    }

    public function getQuery($label) {
        $query = $this->queries[$label];
        if (!$query) {
            Logger::logWarn("Tentando recuperar query inexistente. [Query = ".$label."]");
        }
        return $query;
    }
}
?>
