<?php

namespace App\DataObjects;

use Carbon\Carbon;

readonly class Publication
{
    public function __construct(
        public string $name = '',
        public string $publisher = '',
        public Carbon|string $releaseDate = '',
        public string $url = '',
        public string $summary = ''
    ) {
    }

    public static function formArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? '',
            publisher: $data['publisher'] ?? '',
            releaseDate: !empty($data['releaseDate']) ? Carbon::parse($data['releaseDate']) : '',
            url: $data['url'] ?? '',
            summary: $data['summary'] ?? ''
        );
    }
}
