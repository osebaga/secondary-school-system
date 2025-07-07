<?php

namespace App\Exports\Traits;

trait HasAgeingBuckets
{
    public function ageingBuckets(): array
    {
        return [
            '0 - 90',
            '91 - 180',
            '181 - 270',
            '271 - 365',
            '365 - 450',
            '451 - 540',
            '541 - 630',
            '631 - 720',
            '721 - 810',
            '811 - 900',
            '901 - 990',
            '991 - 1080',
            'Above 1080',
        ];
    }
}
