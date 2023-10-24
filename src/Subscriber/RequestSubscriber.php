<?php
declare(strict_types=1);

namespace Jeboehm\AccessProtection\Subscriber;

use Jeboehm\AccessProtection\Factory\ResponseFactoryInterface;
use Jeboehm\AccessProtection\Service\AccessValidatorInterface;
use Shopware\Core\PlatformRequest;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;

final class RequestSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private readonly AccessValidatorInterface $accessValidator,
        private readonly ResponseFactoryInterface $responseFactory,
    ) {
    }

    public static function getSubscribedEvents(): array
    {
        return [RequestEvent::class => 'onRequest'];
    }

    public function onRequest(RequestEvent $event): void
    {
        $request = $event->getRequest();
        $salesChannelId = $request->attributes->getAlnum(PlatformRequest::ATTRIBUTE_SALES_CHANNEL_ID);

        if ($salesChannelId === '') {
            // assume that this is no storefront request
            return;
        }

        if ($this->accessValidator->isAllowed($request, $salesChannelId)) {
            return;
        }

        $event->setResponse($this->responseFactory->createResponse($salesChannelId));
    }
}
