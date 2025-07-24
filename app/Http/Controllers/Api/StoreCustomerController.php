<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StoreCustomer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomerRequest;

/**
 * @OA\Tag(
 *     name="StoreCustomers",
 *     description="API Endpoints for Store Customers"
 * )
 *
 * @OA\PathItem(path="/store-customers")
 */
class StoreCustomerController extends Controller
{
    /**
     * @OA\Get(
     *     path="/store-customers",
     *     tags={"StoreCustomers"},
     *     summary="Get list of store customers",
     *     @OA\Response(response=200, description="Successful operation")
     * )
     */
    public function index()
    {
        return response()->json(['data' => StoreCustomer::all()]);
    }

    /**
     * @OA\Get(
     *     path="/store-customers/{id}",
     *     tags={"StoreCustomers"},
     *     summary="Get a store customer by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=404, description="Store customer not found")
     * )
     */
    public function show($id)
    {
        $customer = StoreCustomer::findOrFail($id);
        return response()->json(['data' => $customer]);
    }

    /**
     * @OA\Post(
     *     path="/store-customers",
     *     tags={"StoreCustomers"},
     *     summary="Create a new store customer",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/StoreCustomer")
     *     ),
     *     @OA\Response(response=201, description="Store customer created successfully"),
     *     @OA\Response(response=422, description="Validation error")
     * )
     */
    public function store(StoreCustomerRequest $request)
    {
        $customer = StoreCustomer::create($request->validated());
        return response()->json(['data' => $customer], 201);
    }

    /**
     * @OA\Put(
     *     path="/store-customers/{id}",
     *     tags={"StoreCustomers"},
     *     summary="Update a store customer",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/StoreCustomer")
     *     ),
     *     @OA\Response(response=200, description="Store customer updated successfully"),
     *     @OA\Response(response=404, description="Store customer not found"),
     *     @OA\Response(response=422, description="Validation error")
     * )
     */
    public function update(StoreCustomerRequest $request, $id)
    {
        $customer = StoreCustomer::findOrFail($id);
        $customer->update($request->validated());
        return response()->json(['data' => $customer]);
    }

    /**
     * @OA\Delete(
     *     path="/store-customers/{id}",
     *     tags={"StoreCustomers"},
     *     summary="Delete a store customer",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=204, description="Store customer deleted successfully"),
     *     @OA\Response(response=404, description="Store customer not found")
     * )
     */
    public function destroy($id)
    {
        $customer = StoreCustomer::findOrFail($id);
        $customer->delete();
        return response()->json(null, 204);
    }
}
