<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AboutPageTest extends TestCase
{
    public function test_about_page_return_true(): void
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
    }

    public function test_the_content_of_the_about_page(): void
    {
        $response = $this->get('/about');

        $response->assertSee('About');
    }
}
