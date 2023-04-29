@extends('DocumentTemplateFiles.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Изменение шаблона поля</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('documentTemplateFiles.show', $documentTemplateFile->document_template_id) }}"> Назад</a>
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

    <form action="{{ route('documentTemplateFiles.update', $documentTemplateFile->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Код поля в шаблоне документа:</strong>
                    <input type="number" name="document_template_id" class="form-control" placeholder="Код поля в шаблоне документа" value="{{ $documentTemplateFile->document_template_id }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Подписанный договор:</strong>
                    <select class="form-control" name="signed_contract">
                        <option value="-1" {{ $documentTemplateFile->signed_contract === -1 ? 'selected' : '' }}>Выберите</option>
                        <option value="1" {{ $documentTemplateFile->signed_contract === 1 ? 'selected' : '' }}>Да</option>
                        <option value="0" {{ $documentTemplateFile->signed_contract === 0 ? 'selected' : '' }}>Нет</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Обновить</button>
            </div>
        </div>

    </form>
@endsection
