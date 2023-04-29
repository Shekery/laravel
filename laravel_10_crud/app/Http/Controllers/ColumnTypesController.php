<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorecolumnTypesRequest;
use App\Http\Requests\UpdatecolumnTypesRequest;
use App\Models\ColumnTypes;
use App\Models\DocumentTemplateColumns;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class ColumnTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $columnTypes = ColumnTypes::all();
        return view('columnTypes.index', compact('columnTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('columnTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecolumnTypesRequest $request): RedirectResponse
    {
        ColumnTypes::create($request->all());

        return redirect()->route('columnTypes.index')->with('success', 'Тип поля успешно создан!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DocumentTemplateColumns $columnType): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $columnTypes = $columnType->columnTypes;
        $document_template_id = $columnType->document_template_id;

        return view('columnTypes.show', compact('columnTypes', 'document_template_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ColumnTypes $columnType): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('columnTypes.edit', compact('columnType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecolumnTypesRequest $request, ColumnTypes $columnType): RedirectResponse
    {
        $columnType->update($request->all());

        return redirect()->route('columnTypes.index')->with('success', 'Тип поля успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ColumnTypes $columnType): RedirectResponse
    {
        $columnType->delete();

        return redirect()->route('columnTypes.index')->with('success', 'Тип поля успешно удален!');
    }
}
