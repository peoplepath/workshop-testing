<?php

use PHPUnit\Framework\TestCase;
use IW\Workshop\Client\Curl;
use IW\Workshop\PostService;

class PostServiceTest extends TestCase
{

    /**
     * Happy day test, kdy vse dopadne dobre.
     * @throws ReflectionException
     */
    public function testCreatePostHappyDay():void
    {
        // udelam moc clienta
        $client = $this->createMock(Curl::class);

        // ID noveho vytvoreneho clanku
        $post_data = json_encode(array("id" => 901));

        // konfigurace klienta
        $client->method('post')->willReturn(array(201, $post_data));   // ok a vratit ID clanku na 901

        // vytvorit postService s Mock clientem
        $postService = new PostService($client);

        // test vysledku jednotlivych volani
        $this->assertEquals(901, $postService->createPost(array("fdsaf", "fdafad")));
    }


    /**
     * Testuji runtime exception z jineho kodu nez 201.
     *
     * @throws ReflectionException
     */
    public function testCreatePostRuntimeException():void
    {
        $this->expectException(RuntimeException::class);

        // udelam moc clienta
        $client = $this->createMock(Curl::class);

        // ID noveho vytvoreneho clanku
        $post_data = json_encode(array("id" => 901));

        // konfigurace klienta
        $client->method('post')->willReturn(array(404, $post_data));   // chyba - vratit cokoliv nez 201

        // vytvorit postService s Mock clientem
        $postService = new PostService($client);

        // test vysledku jednotlivych volani
        $postService->createPost(array("fdsaf", "fdafad"));
    }


    /**
     * Prazdny vstup by nemel vadit.
     *
     * @throws ReflectionException
     */
    public function testCreatePostEmptyInput():void
    {
        // udelam moc clienta
        $client = $this->createMock(Curl::class);

        // ID noveho vytvoreneho clanku
        $post_data = json_encode(array("id" => 901));

        // konfigurace klienta
        $client->method('post')->willReturn(array(201, $post_data));   // ok

        // vytvorit postService s Mock clientem
        $postService = new PostService($client);

        // test vysledku jednotlivych volani
        $this->assertEquals(901, $postService->createPost(array()));
    }
}

