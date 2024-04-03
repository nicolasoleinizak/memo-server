<?php

namespace Tests\Unit;

use Tests\TestCase;
use Database\Factories\MemoTestFactory;
use Database\Factories\MemoTestImageFactory;

class GamesTest extends TestCase
{
    public function test_that_query_to_games_retrieves_requested_fields()
    {
        $memoTests = MemoTestFactory::new()->create();

        $this->withHeader('X-API-Key', env('API_KEY'));

        $response = $this->graphQL('
        {
            memoTests {
                id
            }
        }
        ');

        $response->assertJsonStructure([
            'data' => [
                'memoTests' => [
                    '*' => [
                        'id'
                    ],
                ],
            ],
        ]);

        $response = $this->graphQL('
        {
            memoTests {
                id,
                name
            }
        }
        ');

        $response->assertJsonStructure([
            'data' => [
                'memoTests' => [
                    '*' => [
                        'id',
                        'name'
                    ],
                ],
            ],
        ]);
    }

    public function test_that_query_return_images ()
    {
        $memoTests = MemoTestImageFactory::new()->create();

        $this->withHeader('X-API-Key', env('API_KEY'));

        $response = $this->graphQL('
            {
                memoTests {
                    id,
                    images {
                        id,
                        url
                    }
                }
            }
        ');

        $response->assertJsonStructure([
            'data' => [
                'memoTests' => [
                    '*' => [
                        'id',
                        'images' => [
                            '*' => [
                                'id',
                                'url'
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }

    public function test_that_create_memo_test_mutation_works()
    {
        $this->withHeader('X-API-Key', env('API_KEY'));

        $response = $this->graphQL('
            mutation {
                createMemoTest(memoTest: {
                    name: "Test"
                }) {
                    id
                    name
                }
            }
        ');

        $response->assertJsonStructure([
            'data' => [
                'createMemoTest' => [
                    'id',
                    'name'
                ],
            ],
        ]);

        $response->assertJson([
            'data' => [
                'createMemoTest' => [
                    'name' => 'Test'
                ],
            ],
        ]);

        $response = $this->graphQL('
            {
                memoTests {
                    id,
                    name
                }
            }

        ');

        $response->assertJsonFragment([
            'name' => 'Test'
        ]);

    }
}