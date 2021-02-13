<?php declare(strict_types=1);

namespace Tests\Feature;

use App\User;

abstract class AuthenticatedFeatureTestCase extends \Tests\TestCase
{
    protected User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    protected function login(): User
    {
        $this->user = User::findOrFail(1);
        $this->actingAs($this->user);
        return $this->user;
    }
}
