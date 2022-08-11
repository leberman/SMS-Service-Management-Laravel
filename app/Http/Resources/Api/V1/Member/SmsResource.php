<?php

namespace App\Http\Resources\Api\V1\Member;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SmsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array
    {
        return [
            'uuid' => $this->uuid,
            'type' => 'sms',
            'message' => $this->message,
            'sendAt' => Carbon::make($this->created_at)->format('Y-m-d | h:i:s'),
            'sendForUser' => new UserResource($this->user)
        ];
    }
}
