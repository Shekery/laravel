<?php

namespace App\Http\Controllers;

use App\Models\documentTypes;
use App\Http\Requests\StoredocumentTypesRequest;
use App\Http\Requests\UpdatedocumentTypesRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class DocumentTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $documentTypes = DocumentTypes::all();
        return view('documentTypes.index', compact('documentTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('documentTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoredocumentTypesRequest $request): RedirectResponse
    {
        DocumentTypes::create($request->all());

        return redirect()->route('documentTypes.index')->with('success', 'Тип документа успешно создан!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DocumentTypes $documentTypes): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('documentTypes.show', compact('documentTypes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocumentTypes $documentType): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('documentTypes.edit', compact('documentType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatedocumentTypesRequest $request, DocumentTypes $documentType): RedirectResponse
    {
        $documentType->update($request->all());

        return redirect()->route('documentTypes.index')->with('success', 'Тип документа успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocumentTypes $documentType): RedirectResponse
    {
        $documentType->delete();

        return redirect()->route('documentTypes.index')->with('success', 'Тип документа успешно удален!');
    }
}
