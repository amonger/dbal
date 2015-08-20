<?php

use AMonger\DBAL\Query;

/**
 * Most of this stuff is resolved from the container. We're just mapping it here as it needs to return true
 *
 * @param $server
 * @param $user
 * @param $password
 *
 * @return bool
 */
function mysql_connect_wrapper($server, $user, $password)
{
    return true;
}

function mysql_select_db_wrapper($databaseName)
{
    return true;
}

function mysql_query_wrapper($sql)
{
    return (new AMonger\DBAL\DBAL(new \AMonger\Adapter\DoctrineDBAL($container['db'])))->query($sql);
}

function mysql_fetch_assoc_wrapper(Query $query)
{
    return $query->iterate();
}

function mysql_num_rows_wrapper(Query $query)
{
    return $query->rowCount();
}

function mysql_error_wrapper()
{
    throw new Exception;
}

function mysql_result_wrapper(Query $query, $row, $column)
{
    return $query->result($row, $column);
}
