<?php

namespace Stc\AppBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class VenueRepository extends EntityRepository
{
    public function getAllVenuesWithCoordinates()
    {
        return $this->createQueryBuilder('venue')
            ->select('venue.name, venue.description, venue.tributeto, venue.jjwgMapsLatC, venue.jjwgMapsLngC')
            ->where('venue.deleted = 0')
            ->andWhere("venue.jjwgMapsLatC != ''")
            ->getQuery()
            ->execute();
    }

    public function getAllVenuesWithLookupFields()
    {
        return $this->createQueryBuilder('venue')
            ->select("venue.id, venue.name, venue.description, venue.tributeto, venue.jjwgMapsLatC, venue.jjwgMapsLngC, CONCAT(venue.billingAddressStreet, ' ', venue.billingAddressCity, ' ', venue.billingAddressState, ' ', venue.billingAddressPostalcode, ' ', venue.billingAddressCountry) AS address")
            ->where('venue.deleted = 0')
            ->getQuery()
            ->execute();
    }
}