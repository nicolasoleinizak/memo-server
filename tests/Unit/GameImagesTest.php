<?php

namespace Tests\Unit;

use Tests\TestCase;
use Database\Factories\MemoTestImageFactory;
use Database\Factories\MemoTestFactory;

class GameImagesTest extends TestCase
{
    public function test_create_images()
    {
        $this->withHeader('X-API-Key', env('API_KEY'));

        $memoTest = MemoTestFactory::new()->create();

        $response = $this->graphQL('
            mutation ($input: MemoTestImageInput!) {
                createMemoTestImage (memoTestImage: $input) {
                    id
                }
            }
            ', [
                "input" => [
                    "memo_test_id" => $memoTest->id,
                    "url" => "test",
            ],
        ]);

        $response->assertJsonStructure([
            'data' => [
                'createMemoTestImage' => [
                    'id',
                ],
            ],
        ]);
    }

    public function test_delete_images()
    {
        $this->withHeader('X-API-Key', env('API_KEY'));

        $memoTestImage = MemoTestImageFactory::new()->create();

        $response = $this->graphQL(
            '
            mutation ($id: ID!) {
                deleteMemoTestImage(id: $id) {
                    id
                }
            }
            ',
            ['id' => $memoTestImage->id]
        );

        $response->assertJsonStructure([
            'data' => [
                'deleteMemoTestImage' => [
                    'id',
                ],
            ],
        ]);

    }
}
