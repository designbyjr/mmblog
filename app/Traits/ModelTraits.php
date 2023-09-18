<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

trait ModelTraits
{
    private function cacheKey(): string
    {
        return sprintf(
            "%s",
            $this->getTable(),
        );
    }

    public function cacheRetrieveAll()
    {
        return Cache::remember($this->cacheKey() . 'all', Carbon::now()->addMinutes(5), function () {
            return $this->all();
        });
    }

    public function cacheRetrieveOne()
    {
        return Cache::remember($this->cacheKey() . $this->getKey(), Carbon::now()->addMinutes(5), function () {
            return $this;
        });
    }

}
