<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Images;

class DeleteImage
{
    public function __construct(private int $id)
    {
    }

    public function delete(): bool
    {
        $image = Images::find($this->id);
        return $image->delete() !== false;
    }
}
