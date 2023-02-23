<?php

namespace PrestaShop\Bundle\CoreBundle\Repository\Configuration;

use PrestaShop\Bundle\CoreBundle\Repository\AbstractRepository;
use PrestaShop\Domain\Configuration\ConfigurationRepositoryInterface;

class ConfigurationRepository extends AbstractRepository implements ConfigurationRepositoryInterface
{
    public function loadConfiguration(): array
    {
        $qb = $this->createQueryBuilder()
            ->from($this->table('configuration'), 'c')
            ->leftJoin('c', $this->table('configuration_lang'), 'cl', 'c.id_configuration = cl.id_configuration')
        ;

        return $qb->executeQuery()->fetchAllAssociative();
    }
}
