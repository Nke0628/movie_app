<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MovieTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test
     * @return void
     */
    public function 映画を作成する()
    {
        $response = $this->post('/api/movie',[
            'movi_name' => 'test'
        ]);

        $response->assertStatus(200);
    }
}
