<?php

namespace PrestaShop\Bundle\CoreBundle\Repository;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Query\QueryBuilder;

abstract class AbstractRepository
{
    protected string $databasePrefix;
    protected Connection $connection;

    public function __construct(string $databasePrefix, Connection $connection)
    {
        $this->databasePrefix = $databasePrefix;
        $this->connection = $connection;
    }

    protected function createQueryBuilder(): QueryBuilder
    {
        $qb = new QueryBuilder($this->connection);

        return $qb->select('*');
    }

    protected function table(string $tablename): string
    {
        return sprintf('%s%s', $this->databasePrefix, $tablename);
    }
}
