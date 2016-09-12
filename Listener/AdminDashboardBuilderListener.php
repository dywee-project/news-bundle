<?php

namespace Dywee\NewsBundle\Listener;

use Dywee\CoreBundle\DyweeCoreEvent;
use Dywee\CoreBundle\Event\AdminDashboardBuilderEvent;
use Dywee\NewsBundle\Service\AdminDashboardHandler;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


class AdminDashboardBuilderListener implements EventSubscriberInterface{
    private $adminDashboardHandler;

    public function __construct(AdminDashboardHandler $adminDashboardHandler)
    {
        $this->adminDashboardHandler = $adminDashboardHandler;
    }

    public static function getSubscribedEvents()
    {
        // return the subscribed events, their methods and priorities
        return array(
            DyweeCoreEvent::BUILD_ADMIN_DASHBOARD => array('addElementToDashboard', 1012)
        );
    }

    public function addElementToDashboard(AdminDashboardBuilderEvent $adminDashboardBuilderEvent)
    {
        $adminDashboardBuilderEvent->addElement($this->adminDashboardHandler->getDashboardElement());
    }

}