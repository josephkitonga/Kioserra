<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Requests\PaymentRequest;

/**
 * @OA\Tag(
 *     name="Payments",
 *     description="API Endpoints for Payments"
 * )
 *
 * @OA\PathItem(path="/payments")
 */
class PaymentController extends Controller
{
    /**
     * @OA\Get(
     *     path="/payments",
     *     tags={"Payments"},
     *     summary="Get list of payments",
     *     @OA\Response(response=200, description="Successful operation")
     * )
     */
    public function index()
    {
        return response()->json(['data' => Payment::all()]);
    }

    /**
     * @OA\Get(
     *     path="/payments/{id}",
     *     tags={"Payments"},
     *     summary="Get a payment by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=404, description="Payment not found")
     * )
     */
    public function show($id)
    {
        $payment = Payment::findOrFail($id);
        return response()->json(['data' => $payment]);
    }

    /**
     * @OA\Post(
     *     path="/payments",
     *     tags={"Payments"},
     *     summary="Create a new payment",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Payment")
     *     ),
     *     @OA\Response(response=201, description="Payment created successfully"),
     *     @OA\Response(response=422, description="Validation error")
     * )
     */
    public function store(PaymentRequest $request)
    {
        $payment = Payment::create($request->validated());
        return response()->json(['data' => $payment], 201);
    }

    /**
     * @OA\Put(
     *     path="/payments/{id}",
     *     tags={"Payments"},
     *     summary="Update a payment",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Payment")
     *     ),
     *     @OA\Response(response=200, description="Payment updated successfully"),
     *     @OA\Response(response=404, description="Payment not found"),
     *     @OA\Response(response=422, description="Validation error")
     * )
     */
    public function update(PaymentRequest $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update($request->validated());
        return response()->json(['data' => $payment]);
    }

    /**
     * @OA\Delete(
     *     path="/payments/{id}",
     *     tags={"Payments"},
     *     summary="Delete a payment",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=204, description="Payment deleted successfully"),
     *     @OA\Response(response=404, description="Payment not found")
     * )
     */
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return response()->json(null, 204);
    }
}
