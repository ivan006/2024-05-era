<?php

namespace App\Http\Controllers\Api;

use QuicklistsOrmApi\OrmApi;
use App\Http\Controllers\Controller;
use App\Models\Requirement;
use Illuminate\Http\Request;

class RequirementController extends Controller
{
    protected $itemNameSingular = "Requirement";
    protected $model;

    public function __construct()
    {
        $this->model = new Requirement();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $result = OrmApi::fetchAllWithFullQueryExposure($this->model, $request);
        return response()->json($result['res'], $result['code']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = OrmApi::createItemWithOptionalBulkRelations(
            $request,
            $this->model,
            $this->itemNameSingular
        );
        return response()->json($result['res'], $result['code']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = OrmApi::fetchByIdWithFullQueryExposure($this->model, $id);
        return response()->json($result['res'], $result['code']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $result = OrmApi::updateItem(
            $request,
            $this->model,
            $id,
            $this->itemNameSingular
        );
        return response()->json($result['res'], $result['code']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = OrmApi::deleteItem(
            $this->model,
            $id,
            $this->itemNameSingular
        );
        return response()->json($result['res'], $result['code']);
    }
}