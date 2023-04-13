<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

use App\Models\documentTypes;
use App\Http\Requests\StoredocumentTypesRequest;
use App\Http\Requests\UpdatedocumentTypesRequest;

class documentTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documentTypes = DocumentTypes::all();
        return view('documentTypes.index', compact('documentTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('documentTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoredocumentTypesRequest $request)
    {
        DocumentTypes::create($request->all());

        return redirect()->route('documentTypes.index')->with('success', 'Тип документа успешно создан!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DocumentTypes $documentType)
    {

        return view('documentTypes.show', compact('documentType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocumentTypes $documentType)
    {
        return view('documentTypes.edit', compact('documentType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatedocumentTypesRequest $request, DocumentTypes $documentType)
    {
        $documentType->update($request->all());

        return redirect()->route('documentTypes.index')->with('success', 'Тип документа успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocumentTypes $documentType)
    {
        $documentType->delete();

        return redirect()->route('documentTypes.index')->with('success', 'Тип документа успешно удален!');
    }
}
