<?php declare(strict_types=1);

namespace IW\Test\Workshop;

use PHPUnit\Framework\TestCase;
use Mockery;

use IW\Workshop\PostService;
use IW\Workshop\Client\Curl;

use RuntimeException;

final class PostServiceTest extends TestCase
{
    public function testCreatePostSuccess() {
        $payload = [];

        $stub = $this->mockCurlClient($payload, [201, '{"id": 123}']);

        $service = new PostService($stub);
        $this->assertEquals(123, $service->createPost($payload));
    }

    public function testCreatePostBadStatus() {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Post could not be created.');

        $payload = [];

        $stub = $this->mockCurlClient($payload, [500, '']);

        $service = new PostService($stub);
        $this->assertEquals(123, $service->createPost($payload));
    }

    public function testCreatePostBadStatusJustType() {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Post could not be created.');

        $payload = [];

        $stub = $this->mockCurlClient($payload, ['201', '']);

        $service = new PostService($stub);
        $this->assertEquals(123, $service->createPost($payload));
    }

    public function testCreatePostBadBody() {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('An id of article could not be retrieved.');

        $payload = [];

        $stub = $this->mockCurlClient($payload, [201, '{}']);

        $service = new PostService($stub);
        $this->assertEquals(123, $service->createPost($payload));
    }

    private function mockCurlClient(array $payload, array $expectedResponse) {
        $stub = Mockery::mock(Curl::class);
        $stub->allows()->post(
            'https://jsonplaceholder.typicode.com/posts',
            json_encode($payload),
            ['content-type' => 'application/json']
        )->andReturn($expectedResponse);

        return $stub;
    }
}