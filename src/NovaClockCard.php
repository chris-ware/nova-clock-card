<?php

namespace ChrisWare\NovaClockCard;

use Laravel\Nova\Card;

class NovaClockCard extends Card
{
    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = '1/3';

    public function __construct()
    {
        return $this->withMeta([
            'dateFormat'    => 'dddd, MMMM Do YYYY',
            'timezone'      => config('app.timezone'),
            'timeFormat'    => 'LTS',
            'locale'        => config('app.locale'),
            'display'       => 'text',
        ]);
    }

    public function dateFormat(string $dateFormat)
    {
        return $this->withMeta(['dateFormat' => $dateFormat]);
    }

    public function timeFormat(string $timeFormat)
    {
        return $this->withMeta(['timeFormat' => $timeFormat]);
    }

    public function locale($locale)
    {
        return $this->withMeta(['locale' => $locale]);
    }

    public function timezone($timezone)
    {
        return $this->withMeta(['timezone' => $timezone]);
    }

    public function display($displayType)
    {
        return $this->withMeta(['display' => $displayType]);
    }

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component()
    {
        return 'nova-clock-card';
    }
}
