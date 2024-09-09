<?php

namespace App\Http\Controllers\Swagger;
use App\Http\Controllers\Controller;

 /**
 * @OA\Post(
 *     path="/api/v1/places",
 *     summary="Создание записи о месте",
 *     tags={"Place"},
 *     security={{ "bearerAuth": {}}},
 * 
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="name", type="string", example="Some place"),
 *                     @OA\Property(property="longitude", type="number", example=14.324987, minimum=-180, maximum=180),
 *                     @OA\Property(property="latitude", type="number", example=-60.324987, minimum=-90, maximum=90),
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
 *                 @OA\Property(property="name", type="string", example="Some place"),
 *                 @OA\Property(property="longitude", type="number", example="14.324987"),
 *                 @OA\Property(property="latitude", type="number", example="-60.324987"),
 *             )
 *         )
 *     )
 * ),
 * @OA\Get(
 *     path="/api/v1/places",
 *     summary="Список мест",
 *     tags={"Place"},
 * 
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
 * @OA\Get(
 *     path="/api/v1/places/{place}",
 *     summary="Запись о месте",
 *     tags={"Place"},
 *     
 *     @OA\Parameter(
 *         description="ID места",
 *         in="path",
 *         name="place",
 *         required=true,
 *         example=14,
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
 *     )
 * ),
 * @OA\Post(
 *     path="/api/v1/places/{place}/add",
 *     summary="Добавление места в список желаемых для текущего пользователя",
 *     tags={"Place"},
 *     security={{ "bearerAuth": {}}},
 *     
 *     @OA\Parameter(
 *         description="ID места",
 *         in="path",
 *         name="place",
 *         required=true,
 *         example=14,
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
 *     path="/api/v1/places/{place}/remove",
 *     summary="Удаление места из списка желаемых для текущего пользователя",
 *     tags={"Place"},
 *     security={{ "bearerAuth": {}}},
 *     
 *     @OA\Parameter(
 *         description="ID места",
 *         in="path",
 *         name="place",
 *         required=true,
 *         example=14,
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

class PlaceController extends Controller
{

}
