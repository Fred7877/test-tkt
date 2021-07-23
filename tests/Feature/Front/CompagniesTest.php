<?php

namespace Tests\Unit\Front;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompagniesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Get list of compagnies
     *
     * @return void
     */
    public function test_compagnies_list()
    {
        $response = $this->get('/compagnies');

        $response->assertOk();
    }
}
