<?php

declare(strict_types=1);

namespace App\Http\Resources\Api\V1\Member;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * @param $request
     * @return Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'user_id' => $this->id,
            'uuid' => $this->uuid,
            'type' => 'user',
            'name' => $this->first_name . ' ' . $this->last_name,
            'email' =>$this->email,
            'phone' =>$this->phone
        ];
    }
}
