<?php
declare(strict_types=1);

namespace Beromir\Markdown\EelHelper;

use Neos\Flow\Annotations as Flow;
use Neos\Eel\ProtectedContextAwareInterface;

class ConfigHelper implements ProtectedContextAwareInterface
{
    public function getConfig(bool|null $localSetting, bool|null $globalSetting): bool
    {
        return $localSetting ?? $globalSetting;
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