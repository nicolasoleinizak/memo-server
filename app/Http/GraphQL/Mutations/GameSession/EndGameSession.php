<?php

namespace App\Http\GraphQL\Mutations\GameSession;

use Nuwave\Lighthouse\Execution\HttpGraphQLContext;
use Nuwave\Lighthouse\Execution\ResolveInfo;
use App\Models\GameSession;

class EndGameSession 
{
    public function __invoke($rootValue, array $args, HttpGraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $gameSessionId = $args['endSessionData']['id'];
        $gameSession = GameSession::find($gameSessionId);

        $retries = $args['endSessionData']['retries'];
        $score = 0;
        if ($retries != 0) {
            $score = $gameSession->number_of_pairs / $retries * 100;
        }
        $gameSession->retries = $retries;
        $gameSession->state = 'COMPLETED';
        $gameSession->score = $score;
        $gameSession->save();

        return $gameSession;
    }
}