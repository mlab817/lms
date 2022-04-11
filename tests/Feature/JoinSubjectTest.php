<?php

namespace Tests\Feature;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JoinSubjectTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
//        $subject = Subject::factory()->create();
        $subject = Subject::find(1);

        $user = User::find(1);

        $response = $this->actingAs($user)
            ->post('/join-subject', [
                'uuid'      => $subject->uuid,
                'user_id'   => $user->id,
            ]);

        $response->assertStatus(200);
    }
}
