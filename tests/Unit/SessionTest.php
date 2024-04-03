<?php

namespace Tests\Unit;

use Tests\TestCase;
use Database\Factories\GameSessionFactory;
use Database\Factories\MemoTestFactory;

class SessionTest extends TestCase
{
    public function test_create_game_session_words()
    {
        $this->withHeader('X-API-Key', env('API_KEY'));

        $memoTest = MemoTestFactory::new()->create();

        $response = $this->graphQL('
        mutation {
            createGameSession(memoTestId: ' . $memoTest->id . ') {
                id
                retries   
            }
        }
        ');

        $response->assertJsonStructure([
            'data' => [
                'createGameSession' => [
                    'id',
                    'retries'
                ],
            ],
        ]);
    }

    public function test_end_session_returns_score()
    {
        $this->withHeader('X-API-Key', env('API_KEY'));

        $gameSession = GameSessionFactory::new()->create();

        $response = $this->graphQL('
        mutation ($input: EndSessionInput!) {
            endGameSession(endSessionData: $input) {
                score
            }
        }', [
            "input" => [
                "id" => $gameSession->id,
                "retries" => 20,
            ],
        ]);

        $response->assertJsonStructure([
            'data' => [
                'endGameSession' => [
                    'score'
                ],
            ],
        ]);
    }
}
