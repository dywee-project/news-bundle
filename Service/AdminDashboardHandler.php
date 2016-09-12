<?php

namespace Dywee\NewsBundle\Service;

use Symfony\Component\Routing\Router;

class AdminDashboardHandler
{

    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function getDashboardElement()
    {
        $elements = array(
            'key' => 'news',
            'boxes' => array(
                array(
                    'column' => 'col-md-6',
                    'type' => 'default',
                    'title' => 'news.dashboard.label',
                    'body' => array(
                        array(
                            'boxBody' => false,
                            'controller' => 'DyweeNewsBundle:Dashboard:table'
                        )
                    )
                )
            )
        );

        return $elements;
    }
}