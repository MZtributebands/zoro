<?php

namespace Stc\AppBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class BandRepository extends EntityRepository
{
    public function getAllBandsWithCoordinates()
    {
        return $this->createQueryBuilder('band')
            ->select('band.name, band.description, band.tributeto, band.jjwgMapsLatC, band.jjwgMapsLngC')
            ->where('band.deleted = 0')
            ->andWhere("band.jjwgMapsLatC != ''")
            ->getQuery()
            ->execute();
    }

    public function getAllBandsWithLookupFields()
    {
        return $this->createQueryBuilder('band')
            ->select("band.id, band.name, band.description, band.tributeto, band.jjwgMapsLatC, band.jjwgMapsLngC, CONCAT(band.billingAddressStreet, ' ', band.billingAddressCity, ' ', band.billingAddressState, ' ', band.billingAddressPostalcode, ' ', band.billingAddressCountry) AS address")
            ->where('band.deleted = 0')
            ->getQuery()
            ->execute();
    }
}