<?php
namespace Sofid\AdminBundle\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Sofid\AdminBundle\Entity\Card;

class CardEncoder
{
	public function postPersist(LifecycleEventArgs $args)
	{
		$entity = $args->getEntity();
		$entityManager = $args->getEntityManager();

		// peut-être voulez-vous seulement agir sur une entité « Card »
		if ($entity instanceof Card) {
			// faites quelque chose avec l'entité « Card »
			
			$salt = 'jhgggygkyuT45dsqqsdfqszefq54ds';
			
			$entity->setEncryptedId(hash('sha512',($salt.$entity->getId())));
			
			$entityManager->flush();
		}
	}
}