<?php

namespace Beromir\Markdown\Service;

use Beromir\Markdown\Enums\CommonMarkExtension;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\MarkdownConverter;

class MarkdownService
{
    public static function convertMarkdownToHtml(string|null $markdown, MarkdownConverter $converter): string
    {
        if (is_null($markdown)) {
            return '';
        }

        return $converter->convert($markdown);
    }

    public static function createMarkdownConverter(array $extensions): MarkdownConverter
    {
        // Configure the Environment with all the CommonMark and GFM parsers/renderers
        $environment = new Environment(CommonMarkConfigurationService::getCommonMarkConfiguration($extensions));

        // This extension is always required
        $environment->addExtension(new CommonMarkCoreExtension());

        foreach ($extensions as $extension) {
            $environment->addExtension(new $extension->value);
        }

        return new MarkdownConverter($environment);
    }

    public static function getExtensionsFromFusionDataStructure(array $extensions): array
    {
        $commonMarkExtensions = [];

        foreach ($extensions as $extension => $enabled) {
            if ($enabled) {
                $commonMarkExtensions[] = CommonMarkExtension::getExtensionFromString($extension);
            }
        }

        return $commonMarkExtensions;
    }
}
