<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoredocumentTemplateUsersRequest;
use App\Http\Requests\UpdatedocumentTemplateUsersRequest;
use App\Models\DocumentTemplates;
use App\Models\DocumentTemplateUsers;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class DocumentTemplateUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $documentTemplateUsers = DocumentTemplateUsers::all();
        return view('documentTemplateUsers.index', compact('documentTemplateUsers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('documentTemplateUsers.create');
    }

    /**
     * @param $document_template_id
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function create_with_id($document_template_id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('documentTemplateUsers.create', compact('document_template_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoredocumentTemplateUsersRequest $request): RedirectResponse
    {
        DocumentTemplateUsers::create($request->all());

        return redirect()->route('documentTemplateUsers.show', $request->document_template_id)->with('success', 'Шаблон траффика успешно создан!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DocumentTemplates $documentTemplateUser): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $documentTemplateUsers = $documentTemplateUser->documentTemplateUsers;
        $document_template_id = $documentTemplateUser->id;
        $documentTypeId = $documentTemplateUser->document_type_id;
        return view('documentTemplateUsers.show', compact('documentTemplateUsers', 'documentTypeId', 'document_template_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocumentTemplateUsers $documentTemplateUser): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('documentTemplateUsers.edit', compact('documentTemplateUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatedocumentTemplateUsersRequest $request, DocumentTemplateUsers $documentTemplateUser): RedirectResponse
    {
        $documentTemplateUser->update($request->all());

        return redirect()->route('documentTemplateUsers.show', $request->document_template_id)->with('success', 'Шаблон траффика успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocumentTemplateUsers $documentTemplateUser): RedirectResponse
    {
        $documentTemplateUser->delete();

        return redirect()->route('documentTemplateUsers.show', $documentTemplateUser->document_template_id)->with('success', 'Шаблон траффика успешно удален!');
    }
}
