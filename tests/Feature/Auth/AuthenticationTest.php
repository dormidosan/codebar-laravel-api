<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

//    public function test_can_not_access_protected_route_without_authentication(): void
//    {
//        $response = $this->getJson('api/v1/reagent-inventories');
//
//
//        $response->assertStatus(401);
//        $response->assertJson([
//            'success' => false,
//            'message' => 'Unexpected error occurred. Please try again later.Route [login] not defined.',
//        ]);
//    }
    public function test_can_access_protected_route_with_authentication(): void
    {
        // Simulate a user login
        $user = User::factory()->create();
        $this->actingAs($user, 'sanctum')
            ->getJson('api/v1/reagent-inventories')
            ->assertStatus(200);

    }
}
