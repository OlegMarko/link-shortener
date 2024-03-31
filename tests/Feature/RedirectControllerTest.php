<?php

namespace Tests\Feature;

use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RedirectControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_redirects_to_original_url()
    {
        $link = Link::factory()->create([
            'expiration_time' => Carbon::now()->addHours(1),
            'max_count' => 1,
        ]);

        $response = $this->get(route('links.redirect', $link->token));

        $response->assertRedirect($link->original_url);
    }

    /** @test */
    public function it_redirects_to_original_url_when_max_count_unlimited()
    {
        $link = Link::factory()->create([
            'expiration_time' => Carbon::now()->addHour(),
            'max_count' => 0,
        ]);

        $response = $this->get(route('links.redirect', $link->token));

        $response->assertRedirect($link->original_url);
    }

    /** @test */
    public function it_throws_model_not_found_exception_when_link_expired()
    {
        $link = Link::factory()->create([
            'expiration_time' => Carbon::now()->subHour(),
            'max_count' => 0,
        ]);

        $response = $this->get(route('links.redirect', $link->token));

        $response->assertStatus(404);
    }

    /** @test */
    public function it_throws_model_not_found_exception_when_max_count_exceeded()
    {
        $link = Link::factory()->create([
            'expiration_time' => Carbon::now()->addHour(),
            'max_count' => 1,
            'redirect_count' => 1,
        ]);

        $response = $this->get(route('links.redirect', $link->token));

        $response->assertStatus(404);
    }

    /** @test */
    public function it_throws_model_not_found_exception_when_max_count_unlimited_and_link_expired()
    {
        $link = Link::factory()->create([
            'expiration_time' => Carbon::now()->subHour(),
            'max_count' => 0,
            'redirect_count' => 10,
        ]);

        $response = $this->get(route('links.redirect', $link->token));

        $response->assertStatus(404);
    }
}
