<?php

namespace Aved\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AvedPageBundle:Default:index.html.twig');
    }

    public function eventAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $paginator  = $this->get('knp_paginator');
        $query = $em->getRepository('AvedBlogBundle:Event')->findAllOrdered();
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            3/*limit per page*/
        );
    	return $this->render('AvedPageBundle:Default:event.html.twig', array(
            'events' => $query,
            'pagination' => $pagination
        ));
    }

    public function eventdetailAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('AvedBlogBundle:Event')->findOneById($id);
        $events = $em->getRepository('AvedBlogBundle:Event')->findAllOrdered();
        $articles = $em->getRepository('AvedBlogBundle:Article')->findAllFromEvent($id);
        return $this->render('AvedPageBundle:Default:event_detail.html.twig', array(
            'event' => $event,
            'events' => $events,
            'articles' => $articles
        ));
    }

    public function newsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $paginator  = $this->get('knp_paginator');
        $query = $em->getRepository('AvedBlogBundle:Article')->findAllOrdered();
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            3/*limit per page*/
        );
        return $this->render('AvedPageBundle:Default:article.html.twig', array(
            'articles' => $query,
            'pagination' => $pagination
        ));
    }

    public function newsdetailAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('AvedBlogBundle:Article')->findOneById($id);
        $articles = $em->getRepository('AvedBlogBundle:Article')->findAllOrdered();
        return $this->render('AvedPageBundle:Default:article_detail.html.twig', array(
            'article' => $article,
            'articles' => $articles
        ));
    }

    public function galerieAction()
    {
        $em = $this->getDoctrine()->getManager();
        $event_list = $em->getRepository('AvedBlogBundle:Event')->findAll();

    	return $this->render('AvedPageBundle:Default:galerie.html.twig', array(
            'events' => $event_list
        ));
    }

    public function contactAction()
    {
    	return $this->render('AvedPageBundle:Default:contact.html.twig');
    }

    public function campusAction()
    {
    	return $this->render('AvedPageBundle:Default:campus.html.twig');
    }

    public function mapAction()
    {
    	return $this->render('AvedPageBundle:Default:map.html.twig');
    }

    public function ecoleAction()
    {
    	return $this->render('AvedPageBundle:Default:ecoles.html.twig');
    }

    public function associationAction()
    {
    	return $this->render('AvedPageBundle:Default:associations.html.twig');
    }

    public function equipeAction()
    {
        return $this->render('AvedPageBundle:Default:equipe.html.twig');
    }
}