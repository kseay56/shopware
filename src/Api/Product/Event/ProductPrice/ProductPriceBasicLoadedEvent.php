<?php declare(strict_types=1);

namespace Shopware\Api\Product\Event\ProductPrice;

use Shopware\Api\Customer\Event\CustomerGroup\CustomerGroupBasicLoadedEvent;
use Shopware\Api\Product\Collection\ProductPriceBasicCollection;
use Shopware\Context\Struct\TranslationContext;
use Shopware\Framework\Event\NestedEvent;
use Shopware\Framework\Event\NestedEventCollection;

class ProductPriceBasicLoadedEvent extends NestedEvent
{
    public const NAME = 'product_price.basic.loaded';

    /**
     * @var TranslationContext
     */
    protected $context;

    /**
     * @var ProductPriceBasicCollection
     */
    protected $productPrices;

    public function __construct(ProductPriceBasicCollection $productPrices, TranslationContext $context)
    {
        $this->context = $context;
        $this->productPrices = $productPrices;
    }

    public function getName(): string
    {
        return self::NAME;
    }

    public function getContext(): TranslationContext
    {
        return $this->context;
    }

    public function getProductPrices(): ProductPriceBasicCollection
    {
        return $this->productPrices;
    }

    public function getEvents(): ?NestedEventCollection
    {
        $events = [];
        if ($this->productPrices->getCustomerGroups()->count() > 0) {
            $events[] = new CustomerGroupBasicLoadedEvent($this->productPrices->getCustomerGroups(), $this->context);
        }

        return new NestedEventCollection($events);
    }
}
