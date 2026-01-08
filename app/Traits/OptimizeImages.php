<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

trait OptimizeImages
{
    public function optimizePngImage(string $path): void
    {
    $fullPath = storage_path('app/public/' . $path);

    if (! file_exists($fullPath)) {
        return;
    }

    $originalSize = filesize($fullPath); // bytes
    $oneMb = 1024 * 1024;

    try {
        // RULES
        if ($originalSize < $oneMb) {
            // < 1 MB → biarkan (cuma normalize 1:1)
            $targetWidth = $originalSize;
        } elseif ($originalSize > $oneMb && $originalSize <= 2 * $oneMb) {
            // 1–2 MB
            $targetWidth = 900;
        } elseif ($originalSize > 2 * $oneMb && $originalSize <= 3 * $oneMb) {
            // 2–3 MB
            $targetWidth = 850;
        } elseif ($originalSize > 3 * $oneMb && $originalSize <= 4 * $oneMb) {
            // 2–3 MB
            $targetWidth = 800;
        }
        else {
            // > 4 MB → target ~600 KB
            $targetWidth = 750;
        }

        $manager = new ImageManager(new Driver());

        $image = $manager->read($fullPath)->cover($targetWidth, $targetWidth);
        $encoded = $image->toPng();        
        Storage::disk('public')->put($path, $encoded);

    } catch (\Throwable $e) {
        // optional: log error
        logger()->error('Image optimize failed', [
            'path' => $path,
            'error' => $e->getMessage(),
        ]);
    }
    }
}