<?php

namespace App\DataObjects;

readonly class Basics
{
    public function __construct(
        public string $name = '',
        public string $label = '',
        public string $image = '',
        public string $email = '',
        public string $phone = '',
        public string $url = '',
        public string $summary = '',
        public Location $location = new Location(),
        public array $profiles = []
    ) {
    }

    public static function formArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? '',
            label: $data['label'] ?? '',
            image: $data['image'] ?? '',
            email: $data['email'] ?? '',
            phone: $data['phone'] ?? '',
            url: $data['url'] ?? '',
            summary: $data['summary'] ?? '',
            location: isset($data['location']) ? Location::formArray($data['location']) : new Location(),
            profiles: array_map(fn($p) => SocialProfile::formArray($p), $data['profiles'] ?? [])
        );
    }
}
