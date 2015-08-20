<?php

namespace AMonger\DBAL;

interface Statement
{
    /**
     * Fetches the next row from a result set.
     *
     * @param integer|null $fetchMode
     *
     * @return mixed The return value of this function on success depends on the fetch type.
     *               In all cases, FALSE is returned on failure.
     */
    public function fetch($fetchMode = null);

    /**
     * Returns an array containing all of the result set rows.
     *
     * @param integer|null $fetchMode
     * @param mixed $fetchArgument
     *
     * @return array An array containing all of the remaining rows in the result set.
     */
    public function fetchAll($fetchMode = null, $fetchArgument = 0);

    /**
     * Returns the number of rows affected by the last execution of this statement.
     *
     * @return integer The number of affected rows.
     */
    public function rowCount();
}
