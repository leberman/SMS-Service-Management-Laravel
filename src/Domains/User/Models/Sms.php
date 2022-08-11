<?php

namespace Domains\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Domains\User\Concerns\HasUuid;

class Sms extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'user_id',
        'message'
    ];
}
