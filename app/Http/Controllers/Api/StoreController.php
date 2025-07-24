<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;

/**
 * @OA\Tag(
 *     name="Stores",
 *     description="API Endpoints for Stores"
 * )
 *
 * @OA\PathItem(path="/stores")
 */
class StoreController extends Controller
{
    /**
     * @OA\Get(
     *     path="/stores",
     *     tags={"Stores"},
     *     summary="Get list of stores",
     *     @OA\Response(response=200, description="Successful operation")
     * )
     */
    public function index()
    {
        return response()->json(['data' => Store::all()]);
    }

    /**
     * @OA\Get(
     *     path="/stores/{id}",
     *     tags={"Stores"},
     *     summary="Get a store by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=404, description="Store not found")
     * )
     */
    public function show($id)
    {
        $store = Store::findOrFail($id);
        return response()->json(['data' => $store]);
    }

    /**
     * @OA\Post(
     *     path="/stores",
     *     tags={"Stores"},
     *     summary="Create a new store",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Store")
     *     ),
     *     @OA\Response(response=201, description="Store created successfully"),
     *     @OA\Response(response=422, description="Validation error")
     * )
     */
    public function store(StoreRequest $request)
    {
        $store = Store::create($request->validated());
        return response()->json(['data' => $store], 201);
    }

    /**
     * @OA\Put(
     *     path="/stores/{id}",
     *     tags={"Stores"},
     *     summary="Update a store",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Store")
     *     ),
     *     @OA\Response(response=200, description="Store updated successfully"),
     *     @OA\Response(response=404, description="Store not found"),
     *     @OA\Response(response=422, description="Validation error")
     * )
     */
    public function update(StoreRequest $request, $id)
    {
        $store = Store::findOrFail($id);
        $store->update($request->validated());
        return response()->json(['data' => $store]);
    }

    /**
     * @OA\Delete(
     *     path="/stores/{id}",
     *     tags={"Stores"},
     *     summary="Delete a store",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=204, description="Store deleted successfully"),
     *     @OA\Response(response=404, description="Store not found")
     * )
     */
    public function destroy($id)
    {
        $store = Store::findOrFail($id);
        $store->delete();
        return response()->json(null, 204);
    }
}
