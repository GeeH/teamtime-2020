<?php declare(strict_types=1);

namespace Tests\Feature;

use App\User;

class HomeTest extends AuthenticatedFeatureTestCase
{

    public function test_home_page_redirects_to_login_as_guest(): void
    {
        $response = $this->get(route('home'));
        $response->assertStatus(302);
        $response->assertLocation(route('login'));
    }

    public function test_home_page_displays_user_name_if_user_logged_in()
    {
        $this->login();

        $this->get(route('home'))
            ->assertStatus(200)
            ->assertSee($this->user->name);
    }

    public function test_home_page_displays_person_card_if_user_logged_in()
    {
        $this->login();

        $this->get(route('home'))
            ->assertStatus(200)
            ->assertSee('Zaphod Beeblebrox');
    }

}
