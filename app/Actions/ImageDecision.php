<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Images;

class ImageDecision
{
    public function __construct(private int $imageId)
    {
    }

    public function accept(): bool
    {
        return $this->save(true);
    }

    public function reject(): bool
    {
        return $this->save(false);
    }

    private function save(bool $isAccepted): bool
    {
        $image = new Images();
        $image->image_id = $this->imageId;
        $image->is_accepted = $isAccepted;
        return $image->save();
    }
}
