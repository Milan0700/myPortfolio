<?php

namespace App\DataObjects;

readonly class Interest
{
    public function __construct(
        public string $name = '',
        public array $keywords = []
    ) {
    }

    public static function formArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? '',
            keywords: $data['keywords'] ?? []
        );
    }
}
