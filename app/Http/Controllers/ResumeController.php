<?php

namespace App\Http\Controllers;

use App\DataObjects\Resume;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

use function Symfony\Component\Clock\now;

class ResumeController extends Controller
{
    public function index()
    {
        $resume = Cache::remember('resume_data', Carbon::now()->addDay(), function () {

            $resume = Storage::disk('resumes')->get('resume.json');
            $resumeData = json_decode($resume, true);
            return Resume::formArray($resumeData);
        });

        return view('resume', ['resume' => $resume]);
    }
}
