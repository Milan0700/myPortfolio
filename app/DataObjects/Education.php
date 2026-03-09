<?php

namespace App\DataObjects;

use Carbon\Carbon;

readonly class Education
{
    public function __construct(
        public string $institution = '',
        public string $url = '',
        public string $area = '',
        public string $studyType = '',
        public Carbon|string $startDate = '',
        public Carbon|string $endDate = '',
        public string $score = '',
        public array $courses = []
    ) {
    }

    public static function formArray(array $data): self
    {
        return new self(
            institution: $data['institution'] ?? '',
            url: $data['url'] ?? '',
            area: $data['area'] ?? '',
            studyType: $data['studyType'] ?? '',
            startDate: !empty($data['startDate']) ? Carbon::parse($data['startDate']) : '',
            endDate: !empty($data['endDate']) ? Carbon::parse($data['endDate']) : '',
            score: $data['score'] ?? '',
            courses: $data['courses'] ?? []
        );
    }
}
