<?php

namespace App\DataObjects;

readonly class Reference
{
    public function __construct(
        public string $name = '',
        public string $reference = ''
    ) {
    }

    public static function formArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? '',
            reference: $data['reference'] ?? ''
        );
    }
}
