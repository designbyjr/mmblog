<?php

namespace App\Traits;

trait ModelTraits
{
    public function cacheKey(): string
    {
        return sprintf(
            "%s",
            $this->getTable(),
        );
    }
}
