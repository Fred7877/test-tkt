<?php

namespace Tests\Unit\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompagniesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_get_compagnies_list_paginate()
    {
        $this->artisan('recover:db');

        $numberElement = 10;

        $response = $this->get("api/compagnies/$numberElement");

        $response->assertJsonCount($numberElement, 'data');
    }
}
