<?php
/**
 * Author: Saeed Ahmed
 * Email: saeed.sas@gmail.com
 * Date: 3/7/14
 */

namespace Sofid\UserBundle\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Sofid\UserBundle\Entity\Commercant;

class CodeEncoder
{
    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $entityManager = $args->getEntityManager();

        // peut-�tre voulez-vous seulement agir sur une entit� � Card �
        if ($entity instanceof Commercant) {
            // faites quelque chose avec l'entit� � Card �

            $salt = 'jhgggygkyuT45dsqqsdfqszefq54ds';

            $entity->setCode(hash('sha512',($salt.$entity->getId())));

            $entityManager->flush();
        }
    }
}