<?php declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

class HomepageTest extends TestCase
{
    public function test_the_homepage_returns_a_200_status_code(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
