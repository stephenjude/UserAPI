<?php

namespace Tests\Unit;

use App\Transformers\UserTransformer;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomResponseTest extends TestCase
{
    use RefreshDatabase;

    protected $customResponse;

    protected function setUp(): void
    {
        parent::setUp();
        $this->customResponse = $this->getMockBuilder('App\Traits\CustomResponse')
            ->getMockForTrait();
    }

    /**
     *
     * @Test
     */
    public function test_should_return_not_found_response()
    {
        $response = $this->customResponse->notFound();

        $this->assertEquals(404, $response->getStatusCode());

        $this->assertJson($response->getContent());
    }


    /**
     *
     * @Test
     */
    public function test_should_return_custom_data_response()
    {
        $user = factory(User::class)->create();

        $data = fractal($user, new UserTransformer())->toArray();

        $response = $this->customResponse->customData($data, 'user');

        $this->assertEquals(200, $response->getStatusCode());

        $this->assertJson($response->getContent());
    }
}
