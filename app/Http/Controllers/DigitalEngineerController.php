<?php

namespace App\Http\Controllers;

use App\Services\AIService;

class DigitalEngineerController extends Controller
{
    public function __construct(private AIService $aiService) {}

    public function __invoke()
    {
        return view('pages.digital-engineer', [
            'config' => config('nexus.digital_engineer'),
            'aiAvailable' => $this->aiService->isConfigured(),
        ]);
    }
}
