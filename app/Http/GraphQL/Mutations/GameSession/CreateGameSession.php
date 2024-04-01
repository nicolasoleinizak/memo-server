<?php

namespace App\Http\GraphQL\Mutations\GameSession;

use Nuwave\Lighthouse\Execution\HttpGraphQLContext;
use Nuwave\Lighthouse\Execution\ResolveInfo;
use App\Models\GameSession;
use App\Models\MemoTest;

class CreateGameSession 
{
    public function __invoke($rootValue, array $args, HttpGraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $memoTestId = $args['memoTestId'];
        $memoTest = MemoTest::find($memoTestId);

        $gameSession = new GameSession();
        $gameSession->memo_test_id = $memoTestId;
        $gameSession->number_of_pairs = $memoTest->images->count();
        $gameSession->retries = 0;
        $gameSession->state = 'STARTED';
        $gameSession->save();

        $insertedId = $gameSession->id;

        return GameSession::find($insertedId);
    }
}