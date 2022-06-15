<?php

namespace Beromir\Markdown\Service;

use Beromir\Markdown\Enums\CommonMarkExtension;

class CommonMarkConfigurationService
{
    public static function getCommonMarkConfiguration(array $extensions): array
    {
        $config = [];

        foreach ($extensions as $extension) {
            switch ($extension) {
                case CommonMarkExtension::ExternalLinks:
                    $config['external_link'] = self::getConfigForExternalLinksExtension();
                    break;
            }
        }

        return $config;
    }

    protected static function getConfigForExternalLinksExtension(): array
    {
        return [
            // 'internal_hosts' => 'www.example.com',
            'open_in_new_window' => true,
            'html_class' => '',
            'nofollow' => '',
            'noopener' => 'external',
            'noreferrer' => 'external',
        ];
    }
}
