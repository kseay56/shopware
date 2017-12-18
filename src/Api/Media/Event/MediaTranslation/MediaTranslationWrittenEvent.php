<?php declare(strict_types=1);

namespace Shopware\Api\Media\Event\MediaTranslation;

use Shopware\Api\Entity\Write\WrittenEvent;
use Shopware\Api\Media\Definition\MediaTranslationDefinition;

class MediaTranslationWrittenEvent extends WrittenEvent
{
    public const NAME = 'media_translation.written';

    public function getName(): string
    {
        return self::NAME;
    }

    public function getDefinition(): string
    {
        return MediaTranslationDefinition::class;
    }
}
