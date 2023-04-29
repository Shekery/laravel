@extends('DocumentTemplateColumns.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Изменение шаблона поля</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('documentTemplateColumns.show', $documentTemplateColumn->document_template_id) }}"> Назад</a>
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

    <form action="{{ route('documentTemplateColumns.update', $documentTemplateColumn->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Код поля в шаблоне документа:</strong>
                    <input type="number" name="document_template_id" class="form-control" placeholder="Код поля в шаблоне документа" value="{{ $documentTemplateColumn->document_template_id }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Код поля из таблицы columns:</strong>
                    <input type="text" name="column_type_id" class="form-control" placeholder="Код поля из таблицы columns" value="{{ $documentTemplateColumn->column_type_id }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Важное поле:</strong>
                    <select class="form-control" name="required">
                        <option value="-1" {{ $documentTemplateColumn->required === -1 ? 'selected' : '' }}>Выберите</option>
                        <option value="1" {{ $documentTemplateColumn->required === 1 ? 'selected' : '' }}>Да</option>
                        <option value="0" {{ $documentTemplateColumn->required === 0 ? 'selected' : '' }}>Нет</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Обновить</button>
            </div>
        </div>

    </form>
@endsection
