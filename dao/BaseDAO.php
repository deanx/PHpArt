<?php

require_once(ROOT."/util/Logger.php");
require_once(ROOT."/util/persistencia/PDOConnection.php");

/**
 * Description of BaseDAO
 *
 * @author Vanessa
 */
class BaseDAO {
    private static $configFile = "/../conf/db.cfg.php";

    private static $conn;

    public static function getConn() {

        if (!self::$conn) {

            self::$conn = self::getNewConn();
        }

        return self::$conn;
    }

    public static function getNewConn() {

        // include database configuration file
        require_once(ROOT.self::$configFile);

        $arrayConn = $dbConfig[$connType];

        return new PDOConnection($arrayConn["engine"],
                $arrayConn["host"],
                $arrayConn["database"],
                $arrayConn["user"],
                $arrayConn["password"],
                $arrayConn["port"]);
    }

    public function beginTransaction() {
        $this->getConn()->beginTransaction();
        Logger::logInfo("BEGIN TRANSACTION");
    }

    public function commitTransaction() {
        $this->getConn()->commitTransaction();
        Logger::logInfo("COMMIT TRANSACTION");
    }

    public function rollbackTransaction() {
        $this->getConn()->rollbackTransaction();
        Logger::logError("ROLLBACK TRANSACTION");
    }
}
?>
