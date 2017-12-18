<?php declare(strict_types=1);

namespace Shopware\Api\Media\Event\MediaTranslation;

use Shopware\Api\Media\Collection\MediaTranslationBasicCollection;
use Shopware\Context\Struct\TranslationContext;
use Shopware\Framework\Event\NestedEvent;

class MediaTranslationBasicLoadedEvent extends NestedEvent
{
    public const NAME = 'media_translation.basic.loaded';

    /**
     * @var TranslationContext
     */
    protected $context;

    /**
     * @var MediaTranslationBasicCollection
     */
    protected $mediaTranslations;

    public function __construct(MediaTranslationBasicCollection $mediaTranslations, TranslationContext $context)
    {
        $this->context = $context;
        $this->mediaTranslations = $mediaTranslations;
    }

    public function getName(): string
    {
        return self::NAME;
    }

    public function getContext(): TranslationContext
    {
        return $this->context;
    }

    public function getMediaTranslations(): MediaTranslationBasicCollection
    {
        return $this->mediaTranslations;
    }
}
