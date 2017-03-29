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

		// peut-�tre voulez-vous seulement agir sur une entit� � Card �
		if ($entity instanceof Card) {
			// faites quelque chose avec l'entit� � Card �
			
			$salt = 'jhgggygkyuT45dsqqsdfqszefq54ds';
			
			$entity->setEncryptedId(substr(hash('sha512',($salt.$entity->getId())), 0, 12));
			
			$entityManager->flush();
		}
	}
}