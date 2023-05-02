@extends('DocumentTemplateColumns.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Просмотр шаблона поля</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('documentTemplateColumns.create_with_id', ['document_template_id' => $document_template_id]) }}"> Добавить запись</a>
                <a class="btn btn-primary" href="{{ route('documentTemplates.show', $documentTypeId) }}"> Назад</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Код поля в шаблоне документа</th>
            <th>Код поля из таблицы columns</th>
            <th>Важное поле</th>
            <th>Действие</th>
        </tr>

        @foreach ($documentTemplateColumns as $documentTemplateColumn)
            <tr>
                <td>{{ $documentTemplateColumn->document_template_id }}</td>
                <td>
                    {{ $documentTemplateColumn->column_type_id }}
                    <a class="btn btn-info" style="float: right" href="{{ route('columnTypes.show',['columnType' => $documentTemplateColumn]) }}">Посмотреть</a>
                </td>
                <td>{{ $documentTemplateColumn->required }}</td>
                <td>
                    <form action="{{ route('documentTemplateColumns.destroy', $documentTemplateColumn) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('documentTemplateColumns.edit', $documentTemplateColumn) }}">Изменить</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
