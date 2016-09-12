<?php

namespace Dywee\NewsBundle\Controller;

use Dywee\CoreBundle\Controller\ParentController;
use Dywee\NewsBundle\Entity\News;
use Dywee\NewsBundle\Form\NewsType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class NewsController extends ParentController
{

    /**
     * @Route(name="news_add", path="admin/news/add")
     */
    public function myAddAction(Request $request)
    {
        return parent::addAction($request); 
    }

    /**
     * @Route(name="news_view", path="news/{id}")
     */
    public function myViewAction($object)
    {
        return parent::viewAction($object); 
    }

    /**
     * @Route(name="news_update", path="admin/news/{id}/update")
     */
    public function myUpdateAction($object, Request $request)
    {
        return parent::updateAction($object, $request); 
    }

    /**
     * @Route(name="news_table", path="admin/news")
     */
    public function myTableAction($parameters = null)
    {
        return parent::tableAction($parameters); 
    }

    /**
     * @Route(name="news_delete", path="admin/news/{id}/delete")
     */
    public function myDeleteAction($object, Request $request)
    {
        return parent::deleteAction($object, $request); 
    }

    public function listAction($limit = null)
    {
        $em = $this->getDoctrine()->getManager();
        $nr = $em->getRepository('DyweeNewsBundle:News');

        $nl = $nr->myFind($this->container->getParameter('website.id'), $limit);

        return $this->render('DyweeNewsBundle:News:list.html.twig', array('newsList' => $nl));

    }

    public function sidebarAction($limit = 3)
    {
        $em = $this->getDoctrine()->getManager();
        $nr = $em->getRepository('DyweeNewsBundle:News');

        $nl = $nr->myFind($this->container->getParameter('website.id'), $limit);

        return $this->render('DyweeNewsBundle:News:sidebar.html.twig', array('newsList' => $nl));
    }
}
