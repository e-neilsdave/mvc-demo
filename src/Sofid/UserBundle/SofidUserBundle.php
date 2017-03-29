<?php

namespace Sofid\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SofidUserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
