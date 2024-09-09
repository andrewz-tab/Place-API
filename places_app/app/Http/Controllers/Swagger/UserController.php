<?php

namespace App\Http\Controllers\Swagger;
use App\Http\Controllers\Controller;

 /**
 * @OA\Post(
 *     path="/api/v1/users",
 *     summary="Создание пользователя",
 *     tags={"User"},
 *     security={{ "bearerAuth": {}}},
 * 
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="login", type="string", example="andrew"),
 *                     @OA\Property(property="role", type="string", example="user"),
 *                     @OA\Property(property="password", type="string", example="password1234"),
 *                     @OA\Property(property="password_confirmation", type="string", example="password1234"),
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
 * @OA\Get(
 *     path="/api/v1/users",
 *     summary="Список пользователей",
 *     tags={"User"},
 *     security={{ "bearerAuth": {}}},
 * 
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="array", @OA\Items(
 *                 @OA\Property(property="id", type="integer", example="14"), 
 *                 @OA\Property(property="role", type="string", example="user"), 
 *                 @OA\Property(property="login", type="string", example="andrew"),
 *             )), 
 *         )
 *     )
 * ),
 * @OA\Get(
 *     path="/api/v1/users/{user}",
 *     summary="Запись о пользователе",
 *     tags={"User"},
 *     security={{ "bearerAuth": {}}},
 *     
 *     @OA\Parameter(
 *         description="ID пользователя",
 *         in="path",
 *         name="user",
 *         required=true,
 *         example=14,
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
 * @OA\Get(
 *     path="/api/v1/users/{user}/favorites",
 *     summary="Список желаемого пользователя",
 *     tags={"User"},
 *     security={{ "bearerAuth": {}}},
 *     
 *     @OA\Parameter(
 *         description="ID пользователя",
 *         in="path",
 *         name="user",
 *         required=true,
 *         example=14,
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="array", @OA\Items(
 *                 @OA\Property(property="id", type="integer", example="14"), 
 *                 @OA\Property(property="name", type="string", example="Some place"), 
 *                 @OA\Property(property="longitude", type="number", example="14.324987"), 
 *                 @OA\Property(property="latitude", type="number", example="-60.324987"), 
 *             )), 
 *         )
 *     )
 * ),
 * @OA\Post(
 *     path="/api/v1/users/{user}/place/{place}/add",
 *     summary="Добавление места в список желаемых заданного пользователя",
 *     tags={"User"},
 *     security={{ "bearerAuth": {}}},
 *     
 *     @OA\Parameter(
 *         description="ID пользователя",
 *         in="path",
 *         name="user",
 *         required=true,
 *         example=14,
 *     ),
 *     @OA\Parameter(
 *         description="ID места",
 *         in="path",
 *         name="place",
 *         required=true,
 *         example=3,
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="integer", example="14"),
 *                 @OA\Property(property="name", type="string", example="Some place"),
 *                 @OA\Property(property="longitude", type="number", example="14.324987"),
 *                 @OA\Property(property="latitude", type="number", example="-60.324987"),
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="No more items can be added | This item has already been added",
 *         @OA\JsonContent(
 *                 @OA\Property(property="code", type="integer", example="422"),
 *                 @OA\Property(property="message", type="string", example="No more items can be added"), *             
 *         )
 *     ),
 * ),
 * @OA\Delete(
 *     path="/api/v1/users/{user}/place/{place}/remove",
 *     summary="Удаление места из список желаемого заданного пользователя",
 *     tags={"User"},
 *     security={{ "bearerAuth": {}}},
 *     
 *     @OA\Parameter(
 *         description="ID пользователя",
 *         in="path",
 *         name="user",
 *         required=true,
 *         example=14,
 *     ),
 *     @OA\Parameter(
 *         description="ID места",
 *         in="path",
 *         name="place",
 *         required=true,
 *         example=3,
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="integer", example="14"),
 *                 @OA\Property(property="name", type="string", example="Some place"),
 *                 @OA\Property(property="longitude", type="number", example="14.324987"),
 *                 @OA\Property(property="latitude", type="number", example="-60.324987"),
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="This item is not included in the list",
 *         @OA\JsonContent(
 *                 @OA\Property(property="code", type="integer", example="422"),
 *                 @OA\Property(property="message", type="string", example="This item is not included in the list"),            
 *         )
 *     ),
 * ),
 */
class UserController extends Controller
{
}
