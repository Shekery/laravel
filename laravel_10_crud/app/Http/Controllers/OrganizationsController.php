<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreorganizationsRequest;
use App\Http\Requests\UpdateorganizationsRequest;
use App\Models\DocumentTypes;
use App\Models\Organizations;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class OrganizationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $organizations = Organizations::all();
        return view('organizations.index', compact('organizations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('organizations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreorganizationsRequest $request): RedirectResponse
    {
        Organizations::create($request->all());

        return redirect()->route('organizations.index')->with('success', 'Организация успешно создана!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DocumentTypes $organization): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $organizations = $organization->organizations;
        return view('organizations.show', compact('organizations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organizations $organization): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('organizations.edit', compact('organization'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateorganizationsRequest $request, Organizations $organization): RedirectResponse
    {
        $organization->update($request->all());

        return redirect()->route('organizations.index')->with('success', 'Организация успешно обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organizations $organization): RedirectResponse
    {
        $organization->delete();

        return redirect()->route('organizations.index')->with('success', 'Организация успешно удалена!');
    }
}
