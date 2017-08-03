<?php

namespace Dywee\NewsBundle\Listener;

use Dywee\CoreBundle\DyweeCoreEvent;
use Dywee\CoreBundle\Event\DashboardBuilderEvent;
use Dywee\NewsBundle\Service\AdminDashboardHandler;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


class AdminDashboardBuilderListener implements EventSubscriberInterface
{

    /** @var AdminDashboardHandler */
    private $adminDashboardHandler;

    /**
     * AdminDashboardBuilderListener constructor.
     *
     * @param AdminDashboardHandler $adminDashboardHandler
     */
    public function __construct(AdminDashboardHandler $adminDashboardHandler)
    {
        $this->adminDashboardHandler = $adminDashboardHandler;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        // return the subscribed events, their methods and priorities
        return [
            DyweeCoreEvent::BUILD_ADMIN_DASHBOARD => ['addElementToDashboard', 1012]
        ];
    }

    /**
     * @param DashboardBuilderEvent $dashboardBuilderEvent
     */
    public function addElementToDashboard(DashboardBuilderEvent $dashboardBuilderEvent)
    {
        $dashboardBuilderEvent->addElement($this->adminDashboardHandler->getDashboardElement());
    }

}