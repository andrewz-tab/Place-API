<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Info(
 *     title="Doc API",
 *     version="1.0"
 * ),
 * @OA\PathItem(
 *     path="/api/v1"
 * )
 * @OA\Components(
 *     @OA\SecurityScheme(
 *         securityScheme="bearerAuth",
 *         type="http",
 *         scheme="bearer",
 *     )
 * )
 * 
 * @OA\Post(
 *     path="/api/v1/auth/register",
 *     summary="Регистрация",
 *     tags={"Auth"},
 * 
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="login", type="string", example="andrew"),
 *                     @OA\Property(property="password", type="string", example="Qqwerty1!"),
 *                     @OA\Property(property="password_confirmation", type="string", example="Qqwerty1!"),
 *                 )
 *             }
 *         ),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="integer", example="14"), 
 *                 @OA\Property(property="role", type="string", example="user"), 
 *                 @OA\Property(property="login", type="string", example="andrew"),
 *             )
 *         )
 *     )
 * ),
 * @OA\Post(
 *     path="/api/v1/auth/login",
 *     summary="Авторизация",
 *     tags={"Auth"},
 * 
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="login", type="string", example="andrew"),
 *                     @OA\Property(property="password", type="string", example="Qqwerty1!"),
 *                 )
 *             }
 *         ),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="integer", example="14"), 
 *                 @OA\Property(property="role", type="string", example="user"), 
 *                 @OA\Property(property="login", type="string", example="andrew"),
 *             )
 *         )
 *     )
 * ),
 * @OA\Post(
 *     path="/api/v1/auth/logout",
 *     summary="Выход",
 *     tags={"Auth"},
 *     security={{ "bearerAuth": {}}},
 * 
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="message", type="string", example="Successfully logged out"),
 *             )
 *         )
 *     )
 * ),
 * @OA\Post(
 *     path="/api/v1/auth/refresh",
 *     summary="Обновление токена",
 *     tags={"Auth"},
 *     security={{ "bearerAuth": {}}},
 * 
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="access_token", type="string", example="Token_value"), 
 *                 @OA\Property(property="token_type", type="string", example="bearer"), 
 *                 @OA\Property(property="expires_in", type="string", example="3600"), 
 *             )
 *         )
 *     )
 * ),
  * @OA\Post(
 *     path="/api/v1/auth/me",
 *     summary="Авторизанный пользователь",
 *     tags={"Auth"},
 *     security={{ "bearerAuth": {}}},
 * 
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="integer", example="14"), 
 *                 @OA\Property(property="role", type="string", example="user"), 
 *                 @OA\Property(property="login", type="string", example="andrew"),
 *             )
 *         )
 *     )
 * ),
 */
class AuthController extends Controller
{
    
}