<?php

declare(strict_types=1);

namespace NunoMaduro\PhpInsights\Domain\Metrics\Structure;

use NunoMaduro\PhpInsights\Domain\Contracts\HasPercentage;
use NunoMaduro\PhpInsights\Domain\Contracts\HasValue;
use NunoMaduro\PhpInsights\Domain\Collector;

/**
 * @internal
 */
final class MethodsNonStatic implements HasValue, HasPercentage
{
    /**
     * {@inheritdoc}
     */
    public function getValue(Collector $collector): string
    {
        return sprintf('%d', $collector->getNonStaticMethods());
    }

    /**
     * {@inheritdoc}
     */
    public function getPercentage(Collector $collector): float
    {
        return $collector->getMethods() > 0 ? ($collector->getNonStaticMethods() / $collector->getMethods()) * 100 : 0;
    }
}
