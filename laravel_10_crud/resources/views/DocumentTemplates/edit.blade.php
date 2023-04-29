@extends('DocumentTemplates.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Изменение шаблона документа</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('documentTemplates.show', $documentTemplate->document_type_id) }}"> Назад</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> <br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('documentTemplates.update', $documentTemplate->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Тип документа:</strong>
                    <input type="text" name="document_type_id" class="form-control" placeholder="Тип документа" value="{{ $documentTemplate->document_type_id }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Наименование поля:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Название" value="{{ $documentTemplate->name }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Порядковый номер:</strong>
                    <input type="number" class="form-control" name="sort" placeholder="Стартовый номер" value="{{ $documentTemplate->sort }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Префикс имени таблицы:</strong>
                    <select class="form-control" name="prefix_table">
                        <option value="-1" {{ $documentTemplate->prefix_table === '-1' ? 'selected' : '' }}>Выберите</option>
                        <option value="files" {{ $documentTemplate->prefix_table === 'files' ? 'selected' : '' }}>files</option>
                        <option value="doc_view" {{ $documentTemplate->prefix_table === 'doc_view' ? 'selected' : '' }}>doc_view</option>
                        <option value="traffic" {{ $documentTemplate->prefix_table === 'traffic' ? 'selected' : '' }}>traffic</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Обновить</button>
            </div>
        </div>

    </form>
@endsection
