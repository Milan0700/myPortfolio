<?php

namespace App\Services;
use Carbon\Carbon;
use App\DataObjects\Resume;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ResumeService
{
    public function getResumeData(): Resume
    {
        return Cache::remember('resume_data', Carbon::now()->addDay(), function () {

            $resume = Storage::disk('resumes')->get('resume.json');
            $resumeData = json_decode($resume, true);
            return Resume::formArray($resumeData);
        });
    }
}
