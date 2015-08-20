<?php


namespace AMonger\DBAL;

/**
 * Class Query
 */
class Query
{
    protected $query;
    protected $results;

    /**
     * @param Statement $query
     */
    public function __construct(Statement $query)
    {
        $this->query = $query;
        $this->results = $query->fetchAll();
    }

    /**
     * @return Statement
     */
    public function get()
    {
        return $this->query;
    }

    /**
     * @return mixed
     */
    public function iterate()
    {
        $current = $this->current();
        $this->next();

        return $current;
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return current($this->results);
    }

    /**
     * @return mixed
     */
    public function next()
    {
        return next($this->results);
    }

    /**
     * @return int
     */
    public function rowCount()
    {
        return $this->query->rowCount();
    }

    /**
     * @param $row
     * @param $column
     * @return mixed
     */
    public function result($row, $column)
    {
        return $this->results[$row][$column];
    }
}
