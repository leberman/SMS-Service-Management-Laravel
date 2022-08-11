<?php

namespace App\Http\Controllers\Api\V1\Member;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Member\IndexResource;
use App\Http\Resources\Api\V1\Member\UserResource;
use Domains\User\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IndexContoller extends Controller
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
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
