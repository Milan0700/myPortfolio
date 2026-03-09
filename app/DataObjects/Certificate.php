<?php

namespace App\DataObjects;

use Carbon\Carbon;

readonly class Certificate
{
    public function __construct(
        public string $name = '',
        public Carbon|string $date = '',
        public string $issuer = '',
        public string $url = ''
    ) {
    }

    public static function formArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? '',
            date: !empty($data['date']) ? Carbon::parse($data['date']) : '',
            issuer: $data['issuer'] ?? '',
            url: $data['url'] ?? ''
        );
    }
}
