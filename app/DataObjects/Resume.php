<?php

namespace App\DataObjects;

readonly class Resume
{
    public function __construct(
        public Basics $basics = new Basics(),
        public array $work = [],
        public array $volunteer = [],
        public array $education = [],
        public array $awards = [],
        public array $certificates = [],
        public array $publications = [],
        public array $skills = [],
        public array $languages = [],
        public array $interests = [],
        public array $references = [],
        public array $projects = []
    ) {
    }

    public static function formArray(array $data): self
    {
        return new self(
            basics: isset($data['basics']) ? Basics::formArray($data['basics']) : new Basics(),
            work: array_map(fn($w) => Work::formArray($w), $data['work'] ?? []),
            volunteer: array_map(fn($v) => Volunteer::formArray($v), $data['volunteer'] ?? []),
            education: array_map(fn($e) => Education::formArray($e), $data['education'] ?? []),
            awards: array_map(fn($a) => Award::formArray($a), $data['awards'] ?? []),
            certificates: array_map(fn($c) => Certificate::formArray($c), $data['certificates'] ?? []),
            publications: array_map(fn($p) => Publication::formArray($p), $data['publications'] ?? []),
            skills: array_map(fn($s) => Skill::formArray($s), $data['skills'] ?? []),
            languages: array_map(fn($l) => Language::formArray($l), $data['languages'] ?? []),
            interests: array_map(fn($i) => Interest::formArray($i), $data['interests'] ?? []),
            references: array_map(fn($r) => Reference::formArray($r), $data['references'] ?? []),
            projects: array_map(fn($p) => Project::formArray($p), $data['projects'] ?? []),
        );
    }
}
