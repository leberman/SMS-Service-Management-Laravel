<?php

use Domains\User\Models\Sms;
use Domains\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use JustSteveKing\StatusCode\Http;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->sms = Sms::factory()->create([
        'user_id' => $this->user->id,
        'message' => 'salam test'
    ]);
});


it('it check test index route sms', function () {
    get(route(name: 'api:v1:sms:index'))
        ->assertStatus(Http::OK())
        ->assertJson(function (AssertableJson $json) {
            $json->has(1)
                ->first(function (AssertableJson $json) {
//                $json->dd();
                    $json->where('uuid', $this->sms['uuid'])
                        ->where('type', 'sms')
                        ->where('message', $this->sms['message'])->etc();
                });
        });
});


it('test create sms',function() {
    post(route(name: 'api:v1:sms:store'),[
        'user_id' => $this->user->id,
        'message' => $this->sms->message
    ])->assertStatus(Http::CREATED());
});
