<?php

namespace Aved\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Aved\BlogBundle\Entity\Event;
use Aved\BlogBundle\Entity\Article;
use Aved\BlogBundle\Form\EventType;
use Aved\BlogBundle\Form\ArticleType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AvedAdminBundle:Default:index.html.twig');
    }

    public function neweventAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $event = new Event();
        $form = $this->createForm(new EventType($em), $event);

        if($request->isMethod('POST'))
        {            
            $form->handleRequest($request);

            $thumbnail = $event->getThumbnail();
            $thumbnailName = md5(uniqid()).'.'.$thumbnail->guessExtension();
            $thumbnailDir = $this->container->getParameter('kernel.root_dir').'/../web/uploads/thumbnail';
            $thumbnail->move($thumbnailDir, $thumbnailName);
            $event->setThumbnail('uploads/thumbnail/'.$thumbnailName);

            $banner = $event->getBanner();
            $bannerName = md5(uniqid()).'.'.$banner->guessExtension();
            $bannerDir = $this->container->getParameter('kernel.root_dir').'/../web/uploads/banner';
            $banner->move($bannerDir, $bannerName);
            $event->setBanner('uploads/banner/'.$bannerName);

            $event->setUser($this->get('security.token_storage')->getToken()->getUser());

            if(! $form->isValid())
            {
                return $this->redirectToRoute('aved_new_event');
            }

            $em->persist($event);
            $em->flush();

            return $this->redirectToRoute('aved_new_event');
        }

        return $this->render('AvedAdminBundle:Default:new_event.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function newarticleAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $article = new Article();
        $form = $this->createForm(new ArticleType($em), $article);

        if($request->isMethod('POST'))
        {            
            $form->handleRequest($request);

            $thumbnail = $article->getThumbnail();
            $thumbnailName = md5(uniqid()).'.'.$thumbnail->guessExtension();
            $thumbnailDir = $this->container->getParameter('kernel.root_dir').'/../web/uploads/thumbnail';
            $thumbnail->move($thumbnailDir, $thumbnailName);
            $article->setThumbnail('uploads/thumbnail/'.$thumbnailName);

            $banner = $article->getBanner();
            $bannerName = md5(uniqid()).'.'.$banner->guessExtension();
            $bannerDir = $this->container->getParameter('kernel.root_dir').'/../web/uploads/banner';
            $banner->move($bannerDir, $bannerName);
            $article->setBanner('uploads/banner/'.$bannerName);

            $article->setDate(new \DateTime("now"));
            $article->setUser($this->get('security.token_storage')->getToken()->getUser());

            if(! $form->isValid())
            {
                return $this->redirectToRoute('aved_new_article');
            }

            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('aved_new_article');
        }

        return $this->render('AvedAdminBundle:Default:new_article.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
