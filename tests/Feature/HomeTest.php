<?php declare(strict_types=1);

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class HomeTest extends TestCase
{

    public function test_home_page_redirects_to_login_as_guest(): void
    {
        $response = $this->get(route('home'));
        $response->assertStatus(302);
        $response->assertLocation(route('login'));
    }

    public function test_home_page_displays_user_name_if_user_logged_in()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $this->get(route('home'))
            ->assertStatus(200)
            ->assertSee($user->name);
    }
}
