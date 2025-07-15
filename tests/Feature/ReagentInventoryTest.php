<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReagentInventoryTest extends TestCase
{
    use RefreshDatabase;

//    public function testReagentInventory(): void
//    {
//        $response = $this->getJson('/api/v1/reagent-inventories?reagent_id=1');
//
//        $response->assertStatus(200)
//            ->assertJsonStructure([
//                'message',
//                'data' => [
//                    '*' => [
//                        'id',
//                        'barcode',
//                        'lot',
//                        'expiration_date',
//                        'quantity',
//                        'reagent_id',
//                        'user_id',
//                        'created_at',
//                        'updated_at',
//                        'reagent' => [
//                            'id',
//                            'name',
//                            // other fields...
//                        ],
//                    ],
//                ],
//            ]);
//    }
//
//    public function testStoreReagentInventory(): void
//    {
//        Reagent::factory()
//            ->for(ReagentType::factory())
//            ->create([
//                'id' => 1,
//                'name' => 'Test Reagent',
//            ]);
//
//        BarcodeType::factory()->create([
//            'id' => 1,
//            'name' => 'C128',
//        ]);
//
//        User::factory()->create([
//            'id' => 1,
//            'name' => 'Test User',
//        ]);
//
//        $data = [
//            'barcode_type_id' => 1,
//            'barcode' => '1234567890123',
//            'lot' => 'LOT123',
//            'expiration_date' => '2025-12-31',
//            'reagent_id' => '1',
//        ];
//
//        $response = $this->postJson('/api/v1/reagent-inventories', $data);
//
//        $response->assertStatus(201)
//            ->assertJson([
//                'message' => 'Reagent inventory created',
//                'data' => [
//                    'barcode' => '1234567890123',
//                    'lot' => 'LOT123',
//                    // other fields...
//                ],
//            ]);
//    }
}