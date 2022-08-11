<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Sms;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Member\SmsResource;
use App\Http\Resources\Api\V1\Member\UserResource;
use Domains\User\Models\Sms;
use Domains\User\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $sms = Sms::all();
        return response()->json(
            data: SmsResource::collection(
                resource: $sms,
            ),
            status: 202
        );
    }
}
