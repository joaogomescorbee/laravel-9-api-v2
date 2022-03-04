<?php

declare(strict_types=1);

/**
 * @OA\Info(title="API", version="1.0")
 */
namespace App\Http\Controllers\Api\Users;

use OpenApi\Annotations as OA;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Enums\Version;
use App\Http\Resources\v1_0\UserResource;
use App\Models\User;

final class UsersIndexController extends Controller
{
    /**
     * @OA\Get(
     *     tags={"users"},
     *     summary="Gera a lista de usuarios",
     *     description="Request para gerar a lista de usuarios",
     *     path="/api/v1.0/users",
     *     @OA\Response(response="200", data="Lista de usuario"),
     * ) 
    */
    public function __invoke(Request $request, Version $version): AnonymousResourceCollection
    {
        
        abort_unless(
            $version->greaterThanOrEqualsTo(Version::v1_0),
            Response::HTTP_NOT_FOUND
        );

        $users = User::query()->paginate();

        return UserResource::collection($users);
    }
}
