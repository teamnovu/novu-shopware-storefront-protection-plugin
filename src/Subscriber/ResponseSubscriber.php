<?php
declare(strict_types=1);

namespace Jeboehm\AccessProtection\Subscriber;

use Jeboehm\AccessProtection\Repository\ConfigValueRepository;
use Shopware\Core\PlatformRequest;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

final class ResponseSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private readonly ConfigValueRepository $configValueRepository,
    ) {
    }

    public static function getSubscribedEvents(): array
    {
        return [ResponseEvent::class => 'onResponse'];
    }

    public function onResponse(ResponseEvent $event): void
    {
        $salesChannelId = $event->getRequest()->attributes->getAlnum(PlatformRequest::ATTRIBUTE_SALES_CHANNEL_ID);

        if ($salesChannelId === '') {
            // assume that this is no storefront request
            return;
        }

        if (!$this->configValueRepository->isEnabled($salesChannelId)) {
            return;
        }

        $event->getResponse()->setCache(
            [
                'private' => true,
                'no_store' => true,
            ]
        );
    }
}
