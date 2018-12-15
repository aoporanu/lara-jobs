<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Job;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     *
     */
    public function testOwnerCanCloseJob()
    {
        $job = Job::findById(13);
        $user = User::findById(7);
        dump($user->companies());
        // $user->companies()->jobs()->close(13);
        // $this->assertTrue($user->jobs()->close(13));
    }
}
