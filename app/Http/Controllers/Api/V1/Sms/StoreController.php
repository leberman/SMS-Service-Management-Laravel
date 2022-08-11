<?php

namespace App\Http\Controllers\Api\V1\Sms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Sms\StoreRequest;
use Domains\Shared\Actions\CreateSmsAction;
use Domains\Shared\Factories\SmsFactory;
use Domains\Shared\Jobs\Sms\CreateSms;
use Domains\User\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param StoreRequest $request
     * @return Response
     */
    public function __invoke(StoreRequest $request): Response
    {
        CreateSms::dispatch(
            userId: $request->user_id,
            smsValueObject: SmsFactory::create(
                attributes: $request->validated()
            ));

        return response(
            content: "job sms for user {$request->user_id} created.",
            status: 202
        );
    }

}
