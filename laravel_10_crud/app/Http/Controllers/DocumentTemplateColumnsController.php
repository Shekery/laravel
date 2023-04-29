<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoredocumentTemplateColumnsRequest;
use App\Http\Requests\UpdatedocumentTemplateColumnsRequest;
use App\Models\DocumentTemplateColumns;
use App\Models\DocumentTemplates;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class DocumentTemplateColumnsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $documentTemplateColumns = DocumentTemplateColumns::all();
        return view('documentTemplateColumns.index', compact('documentTemplateColumns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('documentTemplateColumns.create');
    }

    /**
     * @param $document_template_id
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function create_with_id($document_template_id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('documentTemplateColumns.create', compact('document_template_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoredocumentTemplateColumnsRequest $request): RedirectResponse
    {
        DocumentTemplateColumns::create($request->all());

        return redirect()->route('documentTemplateColumns.show', $request->document_template_id)->with('success', 'Шаблон документа успешно создан!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DocumentTemplates $documentTemplateColumn): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $documentTemplateColumns = $documentTemplateColumn->documentTemplateColumns;
        $documentTypeId = $documentTemplateColumn->document_type_id;
        $document_template_id = $documentTemplateColumn->id;

        return view('documentTemplateColumns.show', compact('documentTemplateColumns', 'documentTypeId', 'document_template_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocumentTemplateColumns $documentTemplateColumn): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('documentTemplateColumns.edit', compact('documentTemplateColumn'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatedocumentTemplateColumnsRequest $request, DocumentTemplateColumns $documentTemplateColumn): RedirectResponse
    {
        $documentTemplateColumn->update($request->all());

        return redirect()->route('documentTemplateColumns.show', $request->document_template_id)->with('success', 'Шаблон документа успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocumentTemplateColumns $documentTemplateColumn): RedirectResponse
    {
        $documentTemplateColumn->delete();

        return redirect()->route('documentTemplateColumns.show', $documentTemplateColumn->document_template_id)->with('success', 'Шаблон документа успешно удален!');
    }
}
