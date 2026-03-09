<?php

namespace App\DataObjects;

use Carbon\Carbon;

readonly class Project
{
    public function __construct(
        public string $name = '',
        public Carbon|string $startDate = '',
        public Carbon|string $endDate = '',
        public string $description = '',
        public array $highlights = [],
        public string $url = ''
    ) {
    }

    public static function formArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? '',
            startDate: !empty($data['startDate']) ? Carbon::parse($data['startDate']) : '',
            endDate: !empty($data['endDate']) ? Carbon::parse($data['endDate']) : '',
            description: $data['description'] ?? '',
            highlights: $data['highlights'] ?? [],
            url: $data['url'] ?? ''
        );
    }
}
