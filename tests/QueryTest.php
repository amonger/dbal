<?php

use Mockery as m;

class QueryTest extends PHPUnit_Framework_TestCase
{
//    /**
//     * @var \AMonger\DBAL\Query
//     */
//    private $query;
//
//    public function setUp()
//    {
//        $statement = m::mock(AMonger\DBAL\Statement::class);
//        $this->query = new \AMonger\DBAL\Query($statement);
//    }

    public function testQueryReturnsArrayByPointer()
    {
        $data = array(1, 2, 3, 4, 5);

        $statement = m::mock(AMonger\DBAL\Statement::class);
        $statement->shouldReceive('fetchAll')->andReturn($data);
        $this->query = new \AMonger\DBAL\Query($statement);

        while ($row = $this->query->iterate()) {
            $this->assertSame($row, array_shift($data));
        }
    }

    public function testAssertResultIsCorrectPosition()
    {
        $data = array(
            array('name' => 'alan')
        );

        $statement = m::mock(AMonger\DBAL\Statement::class);
        $statement->shouldReceive('fetchAll')->andReturn($data);
        $this->query = new \AMonger\DBAL\Query($statement);

        $this->assertSame('alan', $this->query->result(0, 'name'));
    }

    public function testAssertGetNextResult()
    {
        $data = array(1, 2, 3, 4, 5);

        $statement = m::mock(AMonger\DBAL\Statement::class);
        $statement->shouldReceive('fetchAll')->andReturn($data);
        $this->query = new \AMonger\DBAL\Query($statement);

        $this->assertSame(2, $this->query->next());
    }

    public function testGetCurrent()
    {
        $data = array(1, 2, 3, 4, 5);

        $statement = m::mock(AMonger\DBAL\Statement::class);
        $statement->shouldReceive('fetchAll')->andReturn($data);
        $this->query = new \AMonger\DBAL\Query($statement);

        $this->assertSame(1, $this->query->current());
    }

    public function testCountResults()
    {
        $data = array(1, 2, 3, 4, 5);

        $statement = m::mock(AMonger\DBAL\Statement::class);
        $statement->shouldReceive('fetchAll')->andReturn($data);
        $statement->shouldReceive('rowCount')->andReturn(5);
        $this->query = new \AMonger\DBAL\Query($statement);

        $this->assertSame(5, $this->query->rowCount());
    }
}
