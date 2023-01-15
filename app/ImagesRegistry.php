<?php

declare(strict_types=1);

namespace App;

use App\Models\Images;

class ImagesRegistry
{
    public function getImagesPack(int $limit = 10, int $iteration = 0): array
    {
        if ($iteration === 10) {
            return [];
        }
        $ids = [];
        for ($i = 0; $i < $limit + 5; $i++) {
            $id = random_int(0, 1000);
            $ids[] = $id;
        }
        $decidedIds = Images::select(['image_id'])
            ->whereIn('id', $ids)
            ->get('image_id')
            ->toArray();

        $ids = array_diff($ids, $decidedIds);

        if (empty($ids)) {
            return $this->getImagesPack($limit, $iteration + 1);
        }

        $images = [];
        foreach ($ids as $id) {
            $images[] = [
                'id' => $id,
                'url' => "https://picsum.photos/id/{$id}/600/500"
            ];
        }
        return $images;
    }

}
