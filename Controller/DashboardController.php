<?php

namespace Dywee\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    public function tableAction()
    {
        $news = $this->getDoctrine()->getRepository('DyweeNewsBundle:News')->findBy(array(), array('updatedAt' => 'desc'), 0, 10);

        return $this->render('DyweeNewsBundle:News:miniTable.html.twig', array('news' => $news));
    }
}