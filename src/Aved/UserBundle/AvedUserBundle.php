<?php

namespace Aved\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AvedUserBundle extends Bundle
{
	public function getParent()
    {
        return 'FOSUserBundle';
    }
}
