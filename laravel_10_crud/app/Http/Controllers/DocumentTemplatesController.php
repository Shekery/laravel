<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoredocumentTemplatesRequest;
use App\Http\Requests\UpdatedocumentTemplatesRequest;
use App\Models\DocumentTemplates;
use App\Models\DocumentTypes;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class DocumentTemplatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $documentTemplates = DocumentTemplates::all();
        return view('documentTemplates.index', compact('documentTemplates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('documentTemplates.create');
    }

    /**
     * @param $document_type_id
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function create_with_id($document_type_id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('documentTemplates.create', compact('document_type_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoredocumentTemplatesRequest $request): RedirectResponse
    {
        DocumentTemplates::create($request->all());

        return redirect()->route('documentTemplates.show', $request->document_type_id)->with('success', 'Шаблон документа успешно создан!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DocumentTypes $documentTemplate): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $documentTemplates = $documentTemplate->documentTemplates;
        $document_type_id = $documentTemplate->id;
        return view('documentTemplates.show', compact('documentTemplates', 'document_type_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocumentTemplates $documentTemplate): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('documentTemplates.edit', compact('documentTemplate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatedocumentTemplatesRequest $request, DocumentTemplates $documentTemplate): RedirectResponse
    {
        $documentTemplate->update($request->all());

        return redirect()->route('documentTemplates.show', $documentTemplate->document_type_id)->with('success', 'Шаблон документа успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocumentTemplates $documentTemplate): RedirectResponse
    {
        $documentTemplate->delete();

        return redirect()->route('documentTemplates.show', $documentTemplate->document_type_id)->with('success', 'Шаблон документа успешно удален!');
    }
}
