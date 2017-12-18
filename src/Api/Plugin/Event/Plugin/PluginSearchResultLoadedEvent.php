<?php declare(strict_types=1);

namespace Shopware\Api\Plugin\Event\Plugin;

use Shopware\Api\Plugin\Struct\PluginSearchResult;
use Shopware\Context\Struct\TranslationContext;
use Shopware\Framework\Event\NestedEvent;

class PluginSearchResultLoadedEvent extends NestedEvent
{
    public const NAME = 'plugin.search.result.loaded';

    /**
     * @var PluginSearchResult
     */
    protected $result;

    public function __construct(PluginSearchResult $result)
    {
        $this->result = $result;
    }

    public function getName(): string
    {
        return self::NAME;
    }

    public function getContext(): TranslationContext
    {
        return $this->result->getContext();
    }
}
