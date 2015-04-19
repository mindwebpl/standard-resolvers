<?php
namespace Mindweb\StandardResolvers;

use Mindweb\Resolve\Resolve;
use Mindweb\Resolve\Event\ResolveEvent;

class TransparentGifResolver extends Resolve
{
    /**
     * @param ResolveEvent $resolveEvent
     */
    public function resolve(ResolveEvent $resolveEvent)
    {
        $resolveEvent->getResponse()->setContent(
            base64_decode('R0lGODlhAQABAJAAAP8AAAAAACH5BAUQAAAALAAAAAABAAEAAAICBAEAOw==')
        );

        $resolveEvent->getResponse()->headers->set('Content-Type', 'image/gif');
    }
}