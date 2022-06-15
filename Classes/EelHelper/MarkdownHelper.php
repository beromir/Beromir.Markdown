<?php
declare(strict_types=1);

namespace Beromir\Markdown\EelHelper;

use Beromir\Markdown\Service\MarkdownService;
use Neos\Flow\Annotations as Flow;
use Neos\Eel\ProtectedContextAwareInterface;

class MarkdownHelper implements ProtectedContextAwareInterface
{
    public function convertMarkdown(string $markdown, array $extensions = [])
    {
        $extensions = MarkdownService::getExtensionsFromFusionDataStructure($extensions);

        $converter = MarkdownService::createMarkdownConverter($extensions);

        return MarkdownService::convertMarkdownToHtml($markdown, $converter);
    }

    /**
     * All methods are considered safe, i.e. can be executed from within Eel
     *
     * @param string $methodName
     * @return boolean
     */
    public function allowsCallOfMethod($methodName): bool
    {
        return true;
    }

}