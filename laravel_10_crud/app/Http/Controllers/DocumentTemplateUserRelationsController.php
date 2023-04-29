<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoredocumentTemplateUserRelationsRequest;
use App\Http\Requests\UpdatedocumentTemplateUserRelationsRequest;
use App\Models\DocumentTemplateUserRelations;
use App\Models\DocumentTemplateUsers;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class DocumentTemplateUserRelationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $documentTemplateUserRelations = DocumentTemplateUserRelations::all();
        return view('documentTemplateUserRelations.index', compact('documentTemplateUserRelations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('documentTemplateUserRelations.create');
    }

    /**
     * @param $document_templates_user_id
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function create_with_id($document_templates_user_id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('documentTemplateUserRelations.create', compact('document_templates_user_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoredocumentTemplateUserRelationsRequest $request): RedirectResponse
    {
        DocumentTemplateUserRelations::create($request->all());

        return redirect()->route('documentTemplateUserRelations.show', $request->document_templates_user_id)->with('success', 'Фиксированный пользователь успешно создан!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DocumentTemplateUsers $documentTemplateUserRelation): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $documentTemplateUserRelations = $documentTemplateUserRelation->documentTemplateUserRelations;
        $document_template_id = $documentTemplateUserRelation->document_template_id;
        $document_templates_user_id = $documentTemplateUserRelation->id;
        return view('documentTemplateUserRelations.show', compact('documentTemplateUserRelations', 'document_template_id', 'document_templates_user_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocumentTemplateUserRelations $documentTemplateUserRelation): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('documentTemplateUserRelations.edit', compact('documentTemplateUserRelation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatedocumentTemplateUserRelationsRequest $request, DocumentTemplateUserRelations $documentTemplateUserRelation): RedirectResponse
    {
        $documentTemplateUserRelation->update($request->all());

        return redirect()->route('documentTemplateUserRelations.show', $request->document_templates_user_id)->with('success', 'Фиксированный пользователь успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocumentTemplateUserRelations $documentTemplateUserRelation): RedirectResponse
    {
        $documentTemplateUserRelation->delete();

        return redirect()->route('documentTemplateUserRelations.show', $documentTemplateUserRelation->document_templates_user_id)->with('success', 'Фиксированный пользователь успешно удален!');
    }
}
