<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Sms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Sms\StoreRequest;
use Domains\User\Jobs\Sms\CreateSms;
use Illuminate\Http\Response;
use Domains\User\Factories\SmsFactory;

class StoreController extends Controller
{
    /**
     * Handle the incoming request of sms.
     *
     * @param StoreRequest $request
     * @return Response
     */
    public function __invoke(StoreRequest $request): Response
    {
        //create sms and dispatch the job
        CreateSms::dispatch(
            userId: $request->user_id,
            smsValueObject: SmsFactory::create(
                attributes: $request->validated()
            )
        );

        return response(
            content: "job sms for user {$request->user_id} created.",
            status: 202
        );
    }
}
