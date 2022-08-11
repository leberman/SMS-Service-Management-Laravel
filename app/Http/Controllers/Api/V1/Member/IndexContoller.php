<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Member;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Member\IndexResource;
use App\Http\Resources\Api\V1\Member\UserResource;
use Domains\User\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IndexContoller extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $users = User::all();
        return response()->json(
            data: UserResource::collection(
                resource: $users,
            ),
            status: 202
        );
    }
}
