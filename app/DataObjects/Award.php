<?php

namespace App\DataObjects;

use Carbon\Carbon;

readonly class Award
{
    public function __construct(
        public string $title = '',
        public Carbon|string $date = '',
        public string $awarder = '',
        public string $summary = ''
    ) {
    }

    public static function formArray(array $data): self
    {
        return new self(
            title: $data['title'] ?? '',
            date: !empty($data['date']) ? Carbon::parse($data['date']) : '',
            awarder: $data['awarder'] ?? '',
            summary: $data['summary'] ?? ''
        );
    }
}
