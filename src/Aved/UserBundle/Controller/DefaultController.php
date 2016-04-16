<?php

namespace Aved\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AvedUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
