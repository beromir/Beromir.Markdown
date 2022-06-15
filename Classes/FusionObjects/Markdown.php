<?php

namespace Beromir\Markdown\FusionObjects;

use Beromir\Markdown\Service\MarkdownService;
use Neos\Flow\Annotations as Flow;
use Neos\Fusion\FusionObjects\AbstractArrayFusionObject;

class Markdown extends AbstractArrayFusionObject
{
    /**
     * If you iterate over "properties" these in here should usually be ignored.
     * For example additional properties in "Case" that are not "Matchers".
     *
     * @var array
     */
    protected $ignoreProperties = ['__meta', 'value'];

    public function evaluate(): string
    {
        $markdown = $this->fusionValue('markdown');
        $extensions = $this->fusionValue('extensions');

        $extensions = MarkdownService::getExtensionsFromFusionDataStructure($extensions);

        $converter = MarkdownService::createMarkdownConverter($extensions);

        return MarkdownService::convertMarkdownToHtml($markdown, $converter);
    }
}
