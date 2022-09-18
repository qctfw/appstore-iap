<?php

namespace Imdhemy\AppStore\ValueObjects;

use Carbon\Carbon;
use DateTime;

class Time
{
    /**
     * @var Carbon
     */
    private Carbon $carbon;

    /**
     * Time constructor
     *
     * @param int $timestampMs
     */
    public function __construct(int $timestampMs)
    {
        $this->carbon = Carbon::createFromTimestampMs($timestampMs);
    }

    /**
     * @return bool
     */
    public function isFuture(): bool
    {
        return Carbon::now()->lessThan($this->carbon);
    }

    /**
     * @return bool
     */
    public function isPast(): bool
    {
        return Carbon::now()->greaterThan($this->carbon);
    }

    /**
     * @return Carbon
     */
    public function getCarbon(): Carbon
    {
        return $this->carbon;
    }

    /**
     * @return Carbon
     */
    public function toCarbon(): Carbon
    {
        return $this->carbon;
    }

    /**
     * @return DateTime
     */
    public function toDateTime(): DateTime
    {
        return $this->carbon->toDateTime();
    }

    /**
     * Check if equals to the given time
     *
     * @param Time $time
     *
     * @return bool
     */
    public function equals(Time $time): bool
    {
        return $this->carbon->eq($time->getCarbon());
    }
}
