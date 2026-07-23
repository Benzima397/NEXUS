<?php

namespace App\Http\Controllers;

use App\Services\ResumeService;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ResumeController extends Controller
{
    public function __construct(private ResumeService $resumeService) {}

    public function index()
    {
        return view('pages.resume', [
            'resume' => config('nexus.resume'),
            'resumeAvailable' => $this->resumeService->resumeExists(),
        ]);
    }

    public function download(): BinaryFileResponse
    {
        return $this->resumeService->getDownloadResponse();
    }
}
