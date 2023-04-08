<?php

namespace App\Http\Controllers;

use App\Models\DocumentTypes;
use Illuminate\Http\Request;

class DocumentTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $document_types = DocumentTypes::latest()->paginate(5);
        return view('DocumentTypes.index',compact('document_types'))->with('i', (request()->input('page', 1) - 1) * 5);
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_number' => 'required',
        ]);

        DocumentTypes::create($request->all());

        return redirect()->route('DocumentTypes.index')->with('success','Document type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($documentType)
    {
        $documentType = DocumentTypes::findOrFail($documentType);

        return view('documentTypes.show',compact('documentType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($documentType)
    {
        $documentType = DocumentTypes::findOrFail($documentType);

        return view('documentTypes.edit',compact('documentType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $documentType)
    {
        $documentType = DocumentTypes::findOrFail($documentType);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'start_number' => 'required|integer|min:1',
        ]);

        $documentType->update($validatedData);

        return redirect()->route('DocumentTypes.index')->with('success','Document type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $documentType = DocumentTypes::find($id);
        $documentType->delete();

        return redirect()->route('DocumentTypes.index')->with('success','Document type deleted successfully');
    }
}
