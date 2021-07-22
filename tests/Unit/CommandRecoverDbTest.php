<?php

namespace Tests\Unit;

use App\Models\Compagny;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommandRecoverDbTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_recoverdb()
    {
        $this->artisan('recover:db');
        $this->assertTrue(Compagny::count() > 1, Compagny::count());
    }
}
