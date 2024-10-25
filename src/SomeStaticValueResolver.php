<?php

declare(strict_types=1);

namespace App;

use App\Contract\SomeValueResolverInterface;
use Symfony\Component\DependencyInjection\Attribute\AsAlias;

#[AsAlias]
class SomeStaticValueResolver implements SomeValueResolverInterface
{
    public function __construct(
        private readonly int $staticValue = 123,
    ) {
    }

    public function resolveValue(): int
    {
        return $this->staticValue;
    }
}
