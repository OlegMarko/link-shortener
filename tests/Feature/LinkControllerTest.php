<?php

namespace Tests\Feature;

use App\Models\Link;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LinkControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_shortened_link()
    {
        $this->withoutExceptionHandling();

        $data = [
            'original_url' => 'https://example.com',
            'max_count' => 2,
            'expiration_hours' => 12,
            'expiration_minutes' => 30,
        ];

        $response = $this->post(route('links.store'), $data);

        $response->assertRedirect();
        $this->assertCount(1, Link::all());
    }

    /** @test */
    public function it_can_delete_a_shortened_link()
    {
        $this->withoutExceptionHandling();

        $link = Link::factory()->create();

        $response = $this->delete(route('links.destroy', $link->id));

        $response->assertRedirect(route('links.create'));
        $this->assertModelMissing($link);
    }
}
