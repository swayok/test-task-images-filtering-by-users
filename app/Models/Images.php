<?php

declare(strict_types=1);

namespace App\Models;

use App\ImagesRepository;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    public $timestamps = false;

    public function getUrl(int $width = 600, int $height = 500): string
    {
        return (new ImagesRepository())
            ->getUrlForId($this->image_id, $width, $height);
    }
}
