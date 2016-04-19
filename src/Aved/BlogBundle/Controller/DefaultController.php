<?php

namespace Aved\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function calendrierAction($_format)
    {
    	$em = $this->getDoctrine()->getManager();
    	$event_list = $em->getRepository('AvedBlogBundle:Event')->findAll();
    	$event_json = array();

    	foreach ($event_list as $event) {
            if($event->getUser()->getSchool() == null) $color = '#2DB4E0';
            else $color = $event->getUser()->getSchool()->getColor();
    		$event_json[] = array(
                'id'        => $event->getId(),
                'title'     => $event->getTitle(),
                'start'     => $event->getStart()->format('Y-m-d H:i:s'),
                'end'       => $event->getEnd()->format('Y-m-d H:i:s'),
                'allDay'    => false,
                'color'     => $color,
    		);
    	}
        return $this->render('AvedBlogBundle:Default:calendrier.html.twig', array(
        	'events' => $event_json
        ));
    }
}