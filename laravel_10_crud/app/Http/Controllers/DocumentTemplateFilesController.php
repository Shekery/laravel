<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoredocumentTemplateFilesRequest;
use App\Http\Requests\UpdatedocumentTemplateFilesRequest;
use App\Models\DocumentTemplateFiles;
use App\Models\DocumentTemplates;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class DocumentTemplateFilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $documentTemplateFiles = DocumentTemplateFiles::all();
        return view('documentTemplateFiles.index', compact('documentTemplateFiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('documentTemplateFiles.create');
    }

    /**
     * @param $document_template_id
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function create_with_id($document_template_id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('documentTemplateFiles.create', compact('document_template_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoredocumentTemplateFilesRequest $request): RedirectResponse
    {
        DocumentTemplateFiles::create($request->all());

        return redirect()->route('documentTemplateFiles.show', $request->document_template_id)->with('success', 'Поле файл в шаблоне успешно создан!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DocumentTemplates $documentTemplateFile): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $documentTemplateFiles = $documentTemplateFile->documentTemplateFiles;
        $documentTypeId = $documentTemplateFile->document_type_id;
        $document_template_id = $documentTemplateFile->id;

        return view('documentTemplateFiles.show', compact('documentTemplateFiles', 'documentTypeId', 'document_template_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocumentTemplateFiles $documentTemplateFile): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('documentTemplateFiles.edit', compact('documentTemplateFile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatedocumentTemplateFilesRequest $request, DocumentTemplateFiles $documentTemplateFile): RedirectResponse
    {
        $documentTemplateFile->update($request->all());

        return redirect()->route('documentTemplateFiles.show', $request->document_template_id)->with('success', 'Поле файл в шаблоне успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocumentTemplateFiles $documentTemplateFile): RedirectResponse
    {
        $documentTemplateFile->delete();

        return redirect()->route('documentTemplateFiles.show', $documentTemplateFile->document_template_id)->with('success', 'Поле файл в шаблоне успешно удален!');
    }
}
