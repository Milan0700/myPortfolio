<?php

namespace App\DataObjects;

use Carbon\Carbon;

readonly class Volunteer
{
    public function __construct(
        public string $organization = '',
        public string $position = '',
        public string $url = '',
        public Carbon|string $startDate = '',
        public Carbon|string $endDate = '',
        public string $summary = '',
        public array $highlights = []
    ) {
    }

    public static function formArray(array $data): self
    {
        return new self(
            organization: $data['organization'] ?? '',
            position: $data['position'] ?? '',
            url: $data['url'] ?? '',
            startDate: !empty($data['startDate']) ? Carbon::parse($data['startDate']) : '',
            endDate: !empty($data['endDate']) ? Carbon::parse($data['endDate']) : '',
            summary: $data['summary'] ?? '',
            highlights: $data['highlights'] ?? []
        );
    }
}
