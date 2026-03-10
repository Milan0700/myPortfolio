<?php

namespace App\Http\Controllers;

use App\Services\ResumeService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\View\Factory;

class ResumeController extends Controller
{

    public function __construct(private ResumeService $resumeService)
    {

    }
    public function index(Factory $factory): View
    {
        return view('resume', ['resume' => $this->resumeService->getResumeData(), 'allowDownload' => true]);
    }

    public function downloadResume(): Response
    {
        $resume = $this->resumeService->getResumeData();
        $pdf = Pdf::loadView('resume', ['resume' => $resumem, 'allowDownload' => false]);
        return $pdf->download($resume->basics->name . 'Resume.pdf');
    }
}
