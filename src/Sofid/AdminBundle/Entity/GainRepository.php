<?php

namespace Sofid\AdminBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * GainRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GainRepository extends EntityRepository
{
    public function getPointByMerchantAndUser($commerant, $user)
    {
        $em = $this->getEntityManager();

        $qb = $em->createQueryBuilder();
        $qb->select('g')
            ->from('SofidAdminBundle:Gain', 'g')
            ->where('g.commercant = :commercantId')
            ->andWhere('g.user = :userId')
            ->setParameter('commercantId', $commerant)
            ->setParameter('userId', $user);

        $query = $qb->getQuery();
        $result = $query->getResult();
        return $result;
    }
}