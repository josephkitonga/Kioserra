<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VendorMetric;
use Illuminate\Http\Request;
use App\Http\Requests\VendorMetricRequest;

/**
 * @OA\Tag(
 *     name="VendorMetrics",
 *     description="API Endpoints for Vendor Metrics"
 * )
 *
 * @OA\PathItem(path="/vendor-metrics")
 */
class VendorMetricController extends Controller
{
    /**
     * @OA\Get(
     *     path="/vendor-metrics",
     *     tags={"VendorMetrics"},
     *     summary="Get list of vendor metrics",
     *     @OA\Response(response=200, description="Successful operation")
     * )
     */
    public function index()
    {
        return response()->json(['data' => VendorMetric::all()]);
    }

    /**
     * @OA\Get(
     *     path="/vendor-metrics/{id}",
     *     tags={"VendorMetrics"},
     *     summary="Get a vendor metric by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=404, description="Vendor metric not found")
     * )
     */
    public function show($id)
    {
        $metric = VendorMetric::findOrFail($id);
        return response()->json(['data' => $metric]);
    }

    /**
     * @OA\Post(
     *     path="/vendor-metrics",
     *     tags={"VendorMetrics"},
     *     summary="Create a new vendor metric",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/VendorMetric")
     *     ),
     *     @OA\Response(response=201, description="Vendor metric created successfully"),
     *     @OA\Response(response=422, description="Validation error")
     * )
     */
    public function store(VendorMetricRequest $request)
    {
        $metric = VendorMetric::create($request->validated());
        return response()->json(['data' => $metric], 201);
    }

    /**
     * @OA\Put(
     *     path="/vendor-metrics/{id}",
     *     tags={"VendorMetrics"},
     *     summary="Update a vendor metric",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/VendorMetric")
     *     ),
     *     @OA\Response(response=200, description="Vendor metric updated successfully"),
     *     @OA\Response(response=404, description="Vendor metric not found"),
     *     @OA\Response(response=422, description="Validation error")
     * )
     */
    public function update(VendorMetricRequest $request, $id)
    {
        $metric = VendorMetric::findOrFail($id);
        $metric->update($request->validated());
        return response()->json(['data' => $metric]);
    }

    /**
     * @OA\Delete(
     *     path="/vendor-metrics/{id}",
     *     tags={"VendorMetrics"},
     *     summary="Delete a vendor metric",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=204, description="Vendor metric deleted successfully"),
     *     @OA\Response(response=404, description="Vendor metric not found")
     * )
     */
    public function destroy($id)
    {
        $metric = VendorMetric::findOrFail($id);
        $metric->delete();
        return response()->json(null, 204);
    }
}
