<?php declare(strict_types=1);

namespace SeidemannStoreTheme\Subscriber;

use Shopware\Core\Framework\DataAbstractionLayer\Event\EntityLoadedEvent;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\System\SalesChannel\Entity\SalesChannelRepositoryInterface;
use Shopware\Storefront\Page\Product\ProductPageCriteriaEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ProductPageSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            ProductPageCriteriaEvent::class => 'onProductPageCriteria'
        ];
    }

    public function onProductPageCriteria(ProductPageCriteriaEvent $event): void
    {
        $criteria = $event->getCriteria();
        // Add association for reviews
        $criteria->addAssociation('productReviews');
    }
}
