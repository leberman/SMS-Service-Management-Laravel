<?php

namespace Domains\Shared\Models;

use Domains\Shared\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'user_id',
        'message'
    ];
}
