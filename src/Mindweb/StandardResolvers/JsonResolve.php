<?php
namespace Mindweb\StandardResolvers;

use Mindweb\Resolve\Resolve;
use Mindweb\Resolve\Event\ResolveEvent;
use Pimple;

class JsonResolve extends Resolve
{
    /**
     * @var float
     */
    private $startTime;

    /**
     * @param Pimple $application
     */
    public function __construct(Pimple $application)
    {
        if (isset($application['startTime'])) {
            $this->startTime = $application['startTime'];
        }
    }
    /**
     * @param ResolveEvent $resolveEvent
     */
    public function resolve(ResolveEvent $resolveEvent)
    {
        $attribution = $resolveEvent->getAttribution();

        if ($this->startTime !== null) {
            $attribution['executionTime'] = (microtime(true) - $this->startTime) * 1000;
        }

        $resolveEvent->getResponse()->setContent(
            json_encode($attribution)
        );

        $resolveEvent->getResponse()->headers->set('Content-Type', 'application/json');
    }
}