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
            $targetWidth = 512;
        } elseif ($originalSize <= 2 * $oneMb) {
            // 1–2 MB → kira2 setengah
            $targetWidth = 384;
        } else {
            // 2–5 MB → target ~600 KB
            $targetWidth = 256;
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