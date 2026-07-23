<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AIService
{
    private const PYTHON_API_URL = 'http://localhost:8000';

    private const TIMEOUT = 30;

    public function isConfigured(): bool
    {
        return config('services.ai.enabled', false)
            && ! empty(config('services.ai.api_url'));
    }

    public function processMessage(string $message): array
    {
        if (! $this->isConfigured()) {
            return $this->getLocalResponse($message);
        }

        try {
            return $this->callPythonApi($message);
        } catch (\Exception $e) {
            Log::error('AI Service failed', [
                'message' => $message,
                'error' => $e->getMessage(),
            ]);

            return $this->getLocalResponse($message);
        }
    }

    private function callPythonApi(string $message): array
    {
        $response = Http::timeout(self::TIMEOUT)
            ->post(self::PYTHON_API_URL.'/api/chat', [
                'message' => $message,
                'context' => $this->buildContext(),
            ]);

        if ($response->failed()) {
            throw new \RuntimeException('Python API returned status: '.$response->status());
        }

        return [
            'answer' => $response->json('answer', 'I received your message.'),
            'source' => 'python_api',
            'status' => 'ok',
        ];
    }

    private function buildContext(): array
    {
        return [
            'projects' => collect(config('nexus.projects'))->map(fn ($p) => [
                'title' => $p['title'],
                'status' => $p['status'],
                'category' => $p['category'],
                'technologies' => $p['technologies'],
            ])->values()->all(),
            'resume' => [
                'summary' => config('nexus.resume.summary'),
                'skills' => config('nexus.resume.skills'),
                'experience' => collect(config('nexus.resume.experience'))->map(fn ($e) => [
                    'title' => $e['title'],
                    'company' => $e['company'],
                ])->values()->all(),
            ],
        ];
    }

    private function getLocalResponse(string $message): array
    {
        $lower = mb_strtolower($message);

        foreach ($this->getResponseMap() as $entry) {
            foreach ($entry['keywords'] as $keyword) {
                if (str_contains($lower, $keyword)) {
                    return [
                        'answer' => $entry['answer'],
                        'source' => 'local',
                        'status' => 'ok',
                    ];
                }
            }
        }

        return [
            'answer' => 'I\'m Benjamin\'s Digital Engineer — currently running on local knowledge. '
                .'Full AI integration is coming soon. Try asking about his projects, skills, or experience.',
            'source' => 'local',
            'status' => 'fallback',
        ];
    }

    private function getResponseMap(): array
    {
        $resume = config('nexus.resume');
        $projects = config('nexus.projects');

        return [
            [
                'keywords' => ['technolog', 'skill', 'stack'],
                'answer' => $this->formatSkills($resume),
            ],
            [
                'keywords' => ['gridspace'],
                'answer' => $this->formatProject('Gridspace', $projects),
            ],
            [
                'keywords' => ['ai assistant', 'ai personal'],
                'answer' => $this->formatProject('AI Personal Assistant', $projects),
            ],
            [
                'keywords' => ['python automation', 'automation'],
                'answer' => $this->formatProject('Python Automation', $projects),
            ],
            [
                'keywords' => ['fastapi', 'wordpress bridge'],
                'answer' => $this->formatProject('FastAPI WordPress Bridge', $projects),
            ],
            [
                'keywords' => ['nexus', 'lab', 'website'],
                'answer' => $this->formatProject('NEXUS', $projects),
            ],
            [
                'keywords' => ['project', 'work', 'building'],
                'answer' => $this->formatProjectsList($projects),
            ],
            [
                'keywords' => ['resum', 'experience', 'background'],
                'answer' => $this->formatExperience($resume),
            ],
            [
                'keywords' => ['contact', 'reach', 'email', 'hire'],
                'answer' => $this->formatContact(),
            ],
            [
                'keywords' => ['laravel', 'php'],
                'answer' => 'Benjamin is proficient in Laravel (v13) and PHP (8.4). '
                    .'He builds production-grade applications with service layer architecture, API versioning and comprehensive testing.',
            ],
            [
                'keywords' => ['python'],
                'answer' => 'Benjamin works extensively with Python, particularly FastAPI for building async APIs, '
                    .'automation scripts and AI/ML integration. He uses Python for rapid prototyping and production services.',
            ],
        ];
    }

    private function formatSkills(array $resume): string
    {
        $skills = collect($resume['skills'])
            ->map(fn ($items, $cat) => "**{$cat}:** ".implode(', ', $items))
            ->implode("\n");

        return "Benjamin's technical capabilities:\n\n{$skills}";
    }

    private function formatProject(string $title, array $projects): string
    {
        $project = collect($projects)->firstWhere('title', $title);

        if (! $project) {
            return "I don't have detailed information about {$title} yet.";
        }

        return "**{$project['title']}** — {$project['tagline']}\n\n"
            ."{$project['description']}\n\n"
            ."**Status:** {$project['status_label']}\n"
            .'**Technologies:** '.implode(', ', $project['technologies']);
    }

    private function formatProjectsList(array $projects): string
    {
        $list = collect($projects)
            ->map(fn ($p) => "- **{$p['title']}** ({$p['status_label']}) — {$p['tagline']}")
            ->implode("\n");

        return "Benjamin's active projects:\n\n{$list}";
    }

    private function formatExperience(array $resume): string
    {
        $experience = collect($resume['experience'])
            ->map(fn ($e) => "**{$e['title']}** at {$e['company']} ({$e['period']})\n{$e['description']}")
            ->implode("\n\n");

        return "Benjamin's professional experience:\n\n{$experience}";
    }

    private function formatContact(): string
    {
        $contact = config('nexus.contact');

        return "You can reach Benjamin through:\n\n"
            ."- **Email:** {$contact['email']}\n"
            ."- **GitHub:** {$contact['github']}\n"
            ."- **LinkedIn:** {$contact['linkedin']}";
    }
}
