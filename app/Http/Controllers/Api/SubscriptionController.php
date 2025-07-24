<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Requests\SubscriptionRequest;

/**
 * @OA\Tag(
 *     name="Subscriptions",
 *     description="API Endpoints for Subscriptions"
 * )
 *
 * @OA\PathItem(path="/subscriptions")
 */
class SubscriptionController extends Controller
{
    /**
     * @OA\Get(
     *     path="/subscriptions",
     *     tags={"Subscriptions"},
     *     summary="Get list of subscriptions",
     *     @OA\Response(response=200, description="Successful operation")
     * )
     */
    public function index()
    {
        return response()->json(['data' => Subscription::all()]);
    }

    /**
     * @OA\Get(
     *     path="/subscriptions/{id}",
     *     tags={"Subscriptions"},
     *     summary="Get a subscription by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=404, description="Subscription not found")
     * )
     */
    public function show($id)
    {
        $subscription = Subscription::findOrFail($id);
        return response()->json(['data' => $subscription]);
    }

    /**
     * @OA\Post(
     *     path="/subscriptions",
     *     tags={"Subscriptions"},
     *     summary="Create a new subscription",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Subscription")
     *     ),
     *     @OA\Response(response=201, description="Subscription created successfully"),
     *     @OA\Response(response=422, description="Validation error")
     * )
     */
    public function store(SubscriptionRequest $request)
    {
        $subscription = Subscription::create($request->validated());
        return response()->json(['data' => $subscription], 201);
    }

    /**
     * @OA\Put(
     *     path="/subscriptions/{id}",
     *     tags={"Subscriptions"},
     *     summary="Update a subscription",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Subscription")
     *     ),
     *     @OA\Response(response=200, description="Subscription updated successfully"),
     *     @OA\Response(response=404, description="Subscription not found"),
     *     @OA\Response(response=422, description="Validation error")
     * )
     */
    public function update(SubscriptionRequest $request, $id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->update($request->validated());
        return response()->json(['data' => $subscription]);
    }

    /**
     * @OA\Delete(
     *     path="/subscriptions/{id}",
     *     tags={"Subscriptions"},
     *     summary="Delete a subscription",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=204, description="Subscription deleted successfully"),
     *     @OA\Response(response=404, description="Subscription not found")
     * )
     */
    public function destroy($id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();
        return response()->json(null, 204);
    }
}
