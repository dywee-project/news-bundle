<?php

namespace Dywee\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PageElementController extends Controller
{

    public function DashboardAction(Request $request)
    {
        $data = array();

        $form = $this->createFormBuilder(array(), $data)->getForm();

        $viewData = array();

        if($form->handleRequest($request)->isValid())
        {
            $viewData['alert'] = $this->get('translator')->trans('form.validated');
        }

        $viewData['form'] = $form->createView();


        return $this->render('DyweeNewsBundle:PageElement:dashboard.html.twig', $viewData);
    }
}