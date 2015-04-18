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
        $resolveEvent->getResponse()->setContent(
            json_encode(
                $resolveEvent->getAttribution()
            )
        );

        $resolveEvent->getResponse()->headers->set('Content-Type', 'application/json');
    }
}