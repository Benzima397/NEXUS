<?php

namespace App\Http\Controllers;

use App\Services\AIService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DigitalEngineerApiController extends Controller
{
    public function __construct(private AIService $aiService) {}

    public function __invoke(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'message' => ['required', 'string', 'max:1000'],
        ]);

        $result = $this->aiService->processMessage($validated['message']);

        return response()->json([
            'answer' => $result['answer'],
            'source' => $result['source'] ?? 'unknown',
            'status' => $result['status'] ?? 'ok',
        ]);
    }
}
