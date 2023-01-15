<?php

declare(strict_types=1);


namespace App\Http\Controllers;

use App\Actions\DeleteImage;
use App\Actions\GetImagesForAdmin;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(Request $request): View
    {
        return view('admin', [
            'token' => $request->get('token')
        ]);
    }

    public function getImages(Request $request): JsonResponse
    {
        $imagesStore = new GetImagesForAdmin();
        $data = $imagesStore->getImages(
            (int)$request->query('length', 25),
            (int)$request->query('start', 0)
        );
        return new JsonResponse([
            'draw' => $request->query('draw', -1),
            'recordsTotal' => $data['total_count'],
            'recordsFiltered' => $data['total_count'],
            'data' => $data['records'],
        ]);
    }

    public function deleteImage(string $id): JsonResponse
    {
        return new JsonResponse([
            'success' => (new DeleteImage((int)$id))->delete()
        ]);
    }
}
