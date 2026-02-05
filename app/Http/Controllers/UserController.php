<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="User API",
 *      description="Documentation API Users",
 *      @OA\Contact(email="admin@example.com")
 * )
 */
class UserController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/users",
     *      operationId="getUsers",
     *      tags={"Users"},
     *      summary="Récupère la liste des utilisateurs",
     *      @OA\Response(
     *          response=200,
     *          description="Succès",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(
     *                  @OA\Property(property="id", type="integer"),
     *                  @OA\Property(property="name", type="string")
     *              )
     *          )
     *      )
     * )
     */
    public function index()
    {
        return response()->json([
            ['id' => 1, 'name' => 'Alice'],
            ['id' => 2, 'name' => 'Bob'],
        ]);
    }
}
