<?php
namespace Mindweb\StandardResolvers;

use Mindweb\Resolve\Resolve;
use Mindweb\Resolve\Event\ResolveEvent;

class JsonResolve extends Resolve
{
    /**
     * @param ResolveEvent $resolveEvent
     */
    public function resolve(ResolveEvent $resolveEvent)
    {
        $attribution = $resolveEvent->getAttribution();
        $this->decorateAttributionWithExecutionTime($attribution);

        $resolveEvent->getResponse()->setContent(
            json_encode($attribution)
        );

        $resolveEvent->getResponse()->headers->set('Content-Type', 'application/json');
    }

    /**
     * @param array $attribution
     */
    private function decorateAttributionWithExecutionTime(array &$attribution)
    {
        if (isset($_SERVER['REQUEST_TIME_FLOAT'])) {
            $attribution['executionTime'] = microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'];
        }
    }
}