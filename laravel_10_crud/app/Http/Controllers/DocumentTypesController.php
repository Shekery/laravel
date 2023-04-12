<?php

namespace App\Http\Controllers;

use App\Models\DocumentTypes;
use Illuminate\Http\Request;
use App\Http\Requests\DocumentTypesUpdateRequest;
use App\Http\Requests\DocumentTypesCreateRequest;

class DocumentTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $DocumentTypes = DocumentTypes::all();
        return view('DocumentTypes.index',compact('DocumentTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('DocumentTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DocumentTypesCreateRequest $request)
    {
        DocumentTypes::create($request->all());

        return redirect()->route('DocumentTypes.index')->with('success','Тип документа успешно создан!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DocumentTypes $documentType)
    {
        return view('documentTypes.show',compact('documentType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocumentTypes $documentType)
    {
        return view('documentTypes.edit',compact('documentType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DocumentTypesUpdateRequest $request, $documentType)
    {
        $documentType->update($request->all());

        return redirect()->route('DocumentTypes.index')->with('success','Тип документа успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocumentTypes $documentType)
    {
        $documentType->delete();

        return redirect()->route('DocumentTypes.index')->with('success','Тип документа успешно удален!');
    }
}
