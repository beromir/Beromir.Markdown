<?php

namespace Beromir\Markdown\Enums;

use League\CommonMark\Extension\ExternalLink\ExternalLinkExtension;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;

enum CommonMarkExtension: string
{
    case Gfm = GithubFlavoredMarkdownExtension::class;
    case ExternalLinks = ExternalLinkExtension::class;

    public static function getExtensionFromString(string $extension): CommonMarkExtension
    {
        return match ($extension) {
            'gfm' => self::Gfm,
            'externalLinks' => self::ExternalLinks,
        };
    }
}
