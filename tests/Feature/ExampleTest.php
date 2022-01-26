<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{

    public function the_main_page_looks_good()
    {
        $response = $this->get(route('movies.index'));

        // $response->assertStatus(200);

        $response->assertSuccessful();
        $response->assertSee('Popular Movies');
    }
}
