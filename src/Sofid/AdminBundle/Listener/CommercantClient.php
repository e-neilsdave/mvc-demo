<?php
namespace Sofid\AdminBundle\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Sofid\UserBundle\Entity\Commercant;
use Mobyt\BackOffice;
use Mobyt\mobytSms;

class CommercantClient
{
	public function postPersist(LifecycleEventArgs $args)
	{
		$entity = $args->getEntity();
		$entityManager = $args->getEntityManager();

		// peut-être voulez-vous seulement agir sur une entité « Commercant »
		if ($entity instanceof Commercant) {
			// faites quelque chose avec l'entité « Card »
			
			$client = new BackOffice();
			
			$client->setUser('F08426');
	
			$client->setPW('jdrn8lh3');
			
			$options['email'] = $entity->getEmail();
			$options['credit'] = '200000000000';
			$options['tpl_id'] = '6484';
			
			$result = $client->clientAdd($entity->getFullname(), $entity->getUsername(), '3hl8nrdj',$options);
			
			$entity->setClient(substr($result, 2));
			
			$result = $client->creditAdd(substr($result, 2), '12611',$options);
			
			$entityManager->flush();
		}
	}
}