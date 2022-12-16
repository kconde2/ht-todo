<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FormTest extends TestCase
{
    /**
     * @return void
     */
    public function test_the_application_returns_a_successful_response_when_showing_form()
    {
        $response = $this->get('/form');

        $response->assertStatus(200);
    }
}
