<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\ImageDecision;
use App\ImagesRegistry;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class FrontendController extends Controller
{
    public function index(): View
    {
        return view('frontend', [
            'images' => (new ImagesRegistry())->getImagesPack()
        ]);
    }

    public function getImages(): JsonResponse
    {
        return new JsonResponse([
            'images' => (new ImagesRegistry())->getImagesPack()
        ]);
    }

    public function acceptImage(string $id): JsonResponse
    {
        return new JsonResponse([
            'success' => (new ImageDecision((int)$id))->accept()
        ]);
    }

    public function rejectImage(string $id): JsonResponse
    {
        return new JsonResponse([
            'success' => (new ImageDecision((int)$id))->reject()
        ]);
    }
}
