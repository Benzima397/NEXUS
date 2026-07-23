<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ResumeService
{
    private const DISK = 'public';

    private const DIRECTORY = 'resume';

    private const FILE_NAME = 'Benjamin_Nwaochei_Resume.pdf';

    private const DOWNLOAD_NAME = 'Benjamin_Nwaochei_Resume.pdf';

    public function getResumePath(): string
    {
        return self::DIRECTORY.'/'.self::FILE_NAME;
    }

    public function resumeExists(): bool
    {
        return Storage::disk(self::DISK)->exists($this->getResumePath());
    }

    public function getDownloadResponse(): BinaryFileResponse
    {
        $path = $this->getResumePath();

        if (! $this->resumeExists()) {
            abort(404, 'Resume file not found.');
        }

        return response()->download(
            Storage::disk(self::DISK)->path($path),
            self::DOWNLOAD_NAME,
            ['Content-Type' => 'application/pdf']
        );
    }
}
