<?php
/**
 * Author: Saeed Ahmed
 * Email: saeed.sas@gmail.com
 * Date: 3/27/14
 */

/**
 * AnswerRecordRepository
 */


namespace Sofid\PoolBundle\Entity;

use Doctrine\ORM\EntityRepository;

class AnswerRecordRepository extends EntityRepository {

    public function getLastPoolByUser($user)
    {
        $em = $this->getEntityManager();

        $qb = $em->createQueryBuilder();

        $qb->add('select', 'a')
            ->add('from', 'PoolBundle:AnswerRecord a')
            ->add('where', 'a.user = :userId')
            ->add('orderBy', 'a.created DESC')
            ->setParameter('userId', $user);

        $query = $qb->getQuery();
//        return $query->getSQL();
        $result = $query->getResult();
        return $result;
    }

}