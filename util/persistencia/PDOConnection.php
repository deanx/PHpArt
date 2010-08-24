<?php

require_once(ROOT."/util/persistencia/Connection.php");
require_once(ROOT."/util/Logger.php");

/**
 * Implementation of the connection class
 */
class PDOConnection implements Connection {

    private $engine;
    private $host;
    private $port;
    private $database;
    private $user;
    private $password;
    private $conn;
    //private $lastResultSet;
    //private $preparedStatement;

    function __construct($engine, $host, $database, $user, $password, $port = "") {

        $this->conn = $this->connect($engine, $host, $database, $user, $password, $port);

        $this->engine = $engine;
        $this->host = $host;
        $this->port = $port;
        $this->database = $database;
        $this->user = $user;
        $this->password = $password;

    }

    private function connect($engine, $host, $database, $user, $password, $port = "") {
        // try get a connection with pdo interface
        try {
            if ($port) {
                $pdoUrl = $engine.":host=".$host.";port=".$port.";dbname=".$database;
            } else {
                $pdoUrl = $engine.":host=".$host.";dbname=".$database;
            }

            if ($user && $password) {
                $conn = new PDO($pdoUrl, $user, $password);
            } else if ($user && !$password) {
                $conn = new PDO($pdoUrl, $user);
            } else {
                $conn = new PDO($pdoUrl);
            }
            
            Logger::logInfo("Conexão estabelecida.");
        } catch (PDOException $e) {
            Logger::logError("Não conseguiu criar conexão PDO: " . $e->getMessage());
            die();
        }

        return $conn;
    }

    function prepare($preparedSql) {
        $preparedStatement = $this->conn->prepare($preparedSql);

        if (!$preparedStatement) {
            $errorInfoArray = $this->conn->errorInfo();
            Logger::logError($errorInfoArray[2]);
        } else {
            Logger::logInfo("Query preparada: " . $preparedSql);
        }

        return $preparedStatement;
    }

    function executePrepared($preparedStatement, $parameters) {
        return $preparedStatement->execute($parameters);
    }

    function prepareAndExecuteStatement($preparedSql, $parameters) {
        $preparedStatement = $this->prepare($preparedSql);

        $this->executePrepared($preparedStatement, $parameters);

        return $preparedStatement;
    }

    function query($sql) {
        $resultSet = $this->conn->query($sql);

        if (!$resultSet) {
            $errorInfoArray = $this->conn->errorInfo();
            Logger::logError($errorInfoArray[2]);
        } else {
            Logger::logInfo("Query executada: " . $sql);
        }
        
        return $resultSet;
    }

    function fetchObject($resultSet) {
        $fetchedObject = $resultSet->fetch(PDO::FETCH_OBJ);
        /*if (!$fetchedObject) {
            $errorInfoArray = $this->conn->errorInfo();
            Logger::logError($errorInfoArray[2]);
        }*/
        return $fetchedObject;
    }

    function fetch($resultSet) {
        $fetched = $resultSet->fetch(PDO::FETCH_BOTH);
        /*if (!$fetchedObject) {
            $errorInfoArray = $this->conn->errorInfo();
            Logger::logError($errorInfoArray[2]);
        }*/
        return $fetched;
    }

    function lastInsertId() {
        return $this->conn->lastInsertId();
    }

    function beginTransaction() {
        $this->conn->beginTransaction();
    }

    function commitTransaction() {
        $this->conn->commit();
    }

    function rollbackTransaction() {
        $this->conn->rollback();
    }
}

?>
