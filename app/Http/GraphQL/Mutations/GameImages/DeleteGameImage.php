<?php

namespace App\Http\GraphQL\Mutations\GameImages;

use Nuwave\Lighthouse\Execution\HttpGraphQLContext;
use Nuwave\Lighthouse\Execution\ResolveInfo;
use App\Models\MemoTestImage;

class DeleteGameImage 
{
    public function __invoke($rootValue, array $args, HttpGraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $imageId = $args['id'];

        $image = MemoTestImage::find($imageId);

        $image->delete();

        return $image;
    }
}