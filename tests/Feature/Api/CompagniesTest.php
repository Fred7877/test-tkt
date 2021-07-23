<?php

namespace Tests\Unit\Api;

use App\Models\Compagny;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;

class CompagniesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the return of index compagnies api.
     *
     * @return void
     */
    public function test_get_compagnies_list()
    {
        $this->artisan('recover:db');

        $numberElement = Compagny::count();

        $response = $this->get("api/compagnies");

        $response->assertJsonCount($numberElement);
    }

    /**
     * Test the return of show compagnies api.
     *
     * @return void
     */
    public function test_get_compagny_detail()
    {
        $this->artisan('recover:db');

        $response = $this->get("api/compagnies/2");

        $response->assertJsonFragment([
            'id' => 2,
        ]);
    }
}
