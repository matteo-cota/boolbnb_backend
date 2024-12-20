<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::with('properties')->get();
        return response()->json(
            [
                'success' => true,
                'result' => $services
            ]
        );   // http://127.0.0.1:8000/api/admin/services
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        $service = Service::with("properties", "properties.user")->findOrFail($service->id);

        return response()->json([
            "success" => true,
            "results" => $service,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
