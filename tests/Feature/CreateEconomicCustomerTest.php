<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class CreateEconomicCustomerTest extends TestCase
{
    /** @test */
    public function test_create_economic_customer()
    {
        Http::preventStrayRequests();

        Http::fake(
            [
                'https://restapi.e-conomic.com/customers' => Http::response(json_decode(file_get_contents(storage_path('app/testdata/economic-customer.json')), true), 200),
            ]
        );

        $response = $this->post(route('economic.customer.store'));

        $response->assertStatus(Response::HTTP_OK)
            ->assertJson(
                [
                    'customerNumber' => 1,
                    'email' => 'customerone@mailinator.com',
                    'name' => 'Decathlon',
                ],
            );
    }
}
