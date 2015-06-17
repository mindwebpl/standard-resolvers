<?php
namespace Mindweb\StandardResolvers;

use Mindweb\Resolve\Event;
use Mindweb\Resolve\Resolve;

class JsonStaticConfirmationResolve extends Resolve
{
    /**
     * @param Event\ResolveEvent $resolveEvent
     */
    public function resolve(Event\ResolveEvent $resolveEvent)
    {
        $resolveEvent->getResponse()->setContent(
            json_encode(
                array(
                    'status' => 'OK'
                )
            )
        );

        $resolveEvent->getResponse()->headers->set('Content-Type', 'application/json');
    }
}