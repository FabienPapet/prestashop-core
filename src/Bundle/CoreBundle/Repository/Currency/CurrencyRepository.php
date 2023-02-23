<?php

namespace PrestaShop\Bundle\CoreBundle\Repository\Currency;

use PrestaShop\Bundle\CoreBundle\Repository\AbstractRepository;
use PrestaShop\Domain\Currency\Model\Currency;
use PrestaShop\Domain\Currency\Model\CurrencyInterface;
use PrestaShop\Domain\Currency\Repository\CurrencyRepositoryInterface;

class CurrencyRepository extends AbstractRepository implements CurrencyRepositoryInterface
{
    public function getCurrencyById(int $currencyId, int $langId): CurrencyInterface
    {
        $qb = $this->createQueryBuilder();

        $qb
            ->from($this->table('currency'), 'c')
            ->leftJoin('c', $this->table('currency_lang'), 'cl', 'c.id_currency = cl.id_currency')
            ->where('c.id_currency = :id')
            ->andWhere('cl.id_lang = :langId')
            ->setParameter('id', $currencyId)
            ->setParameter('langId', $langId)
        ;

        $result = $qb->executeQuery()->fetchAssociative();

        return $this->buildModel($result);
    }

    public function getCurrencyByIsoCode(string $isoCode, int $langId): CurrencyInterface
    {
        // TODO: Implement getCurrencyByIsoCode() method.
    }

    protected function buildModel(array $result): Currency
    {
        return new Currency(
            $result['id_currency'],
            $result['name'],
            $result['iso_code'],
            $result['conversion_rate'],
            $result['symbol'],
            $result['precision'],
            (bool) $result['active'],
        );
    }
}
