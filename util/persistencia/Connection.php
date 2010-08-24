<?php

/**
 * Specifications of the connection class
 */
interface Connection {

    /**
     * Execute a query for the sql entry in actual connection
     *
     * @param String $sql
     */
    function query($sql);

    /**
     * Get a object fetched of the result set
     *
     * @param <mixed> $resultSet
     * @return Object
     */
    function fetchObject($resultSet);

    /**
     * Get the next row fetched of the result set
     *
     * @param <mixed> $resultSet
     * @return mixed
     */
    function fetch($resultSet);


    /**
     * Get the  last inserted row id
     *
     * @return string
     */
    function lastInsertId();

    /**
     * Begin the transaction
     */
    function beginTransaction();

    /**
     * Commit the transaction
     */
    function commitTransaction();

    /**
     * Rollback the transaction
     */
    function rollbackTransaction();
    
    /**
     *
     * @param <string> $preparedSql 
     */
    function prepare($preparedSql);

    /**
     *
     * @param <mixed> $preparedStatement
     * @param <mixed[]> $parameters
     */
    function executePrepared($preparedStatement, $parameters);

    /**
     *
     * @param <string> $preparedSql
     * @param <mixed[]> $parameters
     */
    function prepareAndExecuteStatement($preparedSql, $parameters);

}

?>
