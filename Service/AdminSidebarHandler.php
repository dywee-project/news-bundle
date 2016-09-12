<?php

namespace Dywee\NewsBundle\Service;

use Symfony\Component\Routing\Router;

class AdminSidebarHandler
{

    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function getSideBarMenuElement()
    {
        $menu = array(
            'key' => 'news',
            'icon' => 'fa fa-newspaper-o',
            'label' => 'news.sidebar.label',
            'children' => array(
                array(
                    'icon' => 'fa fa-list-alt',
                    'label' => 'news.sidebar.table',
                    'route' => $this->router->generate('news_table')
                ),
            )
        );

        return $menu;
    }
}