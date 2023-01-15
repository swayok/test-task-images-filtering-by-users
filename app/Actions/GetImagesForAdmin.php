<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Images;
use Carbon\Carbon;
use JetBrains\PhpStorm\ArrayShape;

class GetImagesForAdmin
{
    #[ArrayShape([
        'records' => 'array',
        'total_count' => 'integer',
    ])]
    public function getImages(int $limit, int $offset): array
    {
        $total = Images::count();
        $records = [];
        if ($total > 0) {
            $models = Images::select()
                ->limit($limit)
                ->offset($offset)
                ->get();
            foreach ($models as $model) {
                $records[] = $this->processRecordData($model);
            }
        }

        return [
            'records' => $records,
            'total_count' => $total
        ];
    }

    private function processRecordData(Images $imageInfo): array
    {
        return [
            'id' => $imageInfo->id,
            'url' => $imageInfo->getUrl(250, 150),
            'decision' => $imageInfo->is_accepted
                ? trans('admin.images.table.decisions.accepted')
                : trans('admin.images.table.decisions.rejected'),
            'created_at' => Carbon::parse($imageInfo->created_at)->format('Y-m-d H:i:s')
        ];
    }
}
