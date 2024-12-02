<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::orderByDesc('id')->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        // insert kepada database
        // closure-based transaction

        DB::transaction(function() use ($request){
            $validated = $request->validated();

            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('logos','public');
                $validated['logo'] = $logoPath;
            }

            $newService = Service::create($validated);
        });


        return redirect()->route('admin.services.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        DB::transaction(function() use ($request,$service){
            $validated = $request->validated();

            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('logos','public');
                $validated['logo'] = $logoPath;
            }

            $service->update($validated);
        });

        return redirect()->route('admin.services.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        DB::transaction(function() use ($service){
            $service->delete();
        });

        return redirect()->route('admin.services.index');
    }
}
