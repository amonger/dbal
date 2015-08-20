<?php

namespace AMonger\DBAL;

/**
 * Class MysqlProxy
 */
class DBAL
{
    protected $dbal;

    /**
     * @param Statement $dbal
     */
    public function __construct(Statement $dbal)
    {
        $this->dbal = $dbal;
    }

    /**
     * @param $sql
     * @return Query
     *
     * @throws \Doctrine\DBAL\DBALException
     */
    public function query($sql)
    {
        return new Query($this->dbal->query($sql));
    }
}
